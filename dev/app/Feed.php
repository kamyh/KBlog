<?php namespace App;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class Feed
{
    public $items = [];
    public $title;
    public $description;
    public $link;
    public $logo;
    public $icon;
    public $pubdate;
    public $lang;
    public $charset;
    public $ctype = null;
    protected $shortening = false;
    protected $dateFormat = 'datetime';
    protected $namespaces = [];
    protected $customView = null;

    public function Feed()
    {
        $this->lang = Config::get('application.url');
        $this->charset = 'utf-8';
    }

    public function addItem($title, $author, $link, $pubdate, $description, $content = '', $enclosure = [])
    {
        $this->items[] = array(
            'title' => $title,
            'author' => $author,
            'link' => $link,
            'pubdate' => $pubdate,
            'description' => $description,
            'content' => $content,
            'enclosure' => $enclosure
        );
    }

    public function render($format = "rss")
    {
        if ($this->customView == null) $this->customView = 'rss.'.$format;

        if ($this->ctype == null) {
            ($format == 'rss') ? $this->ctype = 'application/rss+xml' : $this->ctype = 'application/atom+xml';
        }

        if (empty($this->link)) $this->link = Config::get('application.url');
        if (empty($this->pubdate)) $this->pubdate = date('D, d M Y H:i:s O');

        foreach ($this->items as $k => $v) {
            $this->items[$k]['title'] = html_entity_decode(strip_tags($this->items[$k]['title']));
            $this->items[$k]['pubdate'] = $this->formatDate($this->items[$k]['pubdate'], $format);
        }

        $channel = [
            'title' => html_entity_decode(strip_tags($this->title)),
            'description' => $this->description,
            'logo' => $this->logo,
            'icon' => $this->icon,
            'link' => $this->link,
            'pubdate' => $this->formatDate($this->pubdate, $format),
            'lang' => $this->lang
        ];

        $viewData = [
            'items' => $this->items,
            'channel' => $channel,
            'namespaces' => $this->getNamespaces()
        ];


        return Response::make(View::make($this->getView($this->customView), $viewData), 200, array('Content-Type' => $this->ctype . '; charset=' . $this->charset));

    }

    public function link($url, $format = 'atom')
    {

        if ($this->ctype == null) {
            ($format == 'rss') ? $type = 'application/rss+xml' : $type = 'application/atom+xml';
        } else {
            $type = $this->ctype;
        }

        return '<link rel="alternate" type="' . $type . '" href="' . $url . '" />';
    }

    public function getView($format)
    {
        // if a custom view is set, we don't have to account for the format and assume
        // that the developer knows what he's doing
        if ($this->customView !== null && View::exists($this->customView))
            return $this->customView;

        return $format;
    }

    public function setView($name = null)
    {
        $this->customView = $name;
    }

    protected function formatDate($date, $format = 'atom')
    {
        if ($format == "atom") {
            switch ($this->dateFormat) {
                case "carbon":
                    $date = date('c', strtotime($date->toDateTimeString()));
                    break;
                case "timestamp":
                    $date = date('c', $date);
                    break;
                case "datetime":
                    $date = date('c', strtotime($date));
                    break;
            }
        } else {
            switch ($this->dateFormat) {
                case "carbon":
                    $date = date('D, d M Y H:i:s O', strtotime($date->toDateTimeString()));
                    break;
                case "timestamp":
                    $date = date('D, d M Y H:i:s O', $date);
                    break;
                case "datetime":
                    $date = date('D, d M Y H:i:s O', strtotime($date));
                    break;
            }
        }

        return $date;
    }

    public function addNamespace($n)
    {
        $this->namespaces[] = $n;
    }

    public function getNamespaces()
    {
        return $this->namespaces;
    }

    public function setDateFormat($format = "datetime")
    {
        $this->dateFormat = $format;
    }
}