<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\CommonBundle\Traits;

/**
 * Class SocialTrait
 *
 * @package Black\Bundle\CommonBundle\Traits
 */
trait SocialTrait
{
    /**
     * @var array
     */
    protected $hosts = array(
        'behance'       => array(
            'protocol'  => 'http',
            'url'       => 'www.behance.net/',
            'pos'       => 'last'
        ),
        'blogger'       => array(
            'protocol'  => 'http',
            'url'       => '.blogspot.com',
            'pos'       => 'first'
        ),
        'deviantart'    => array(
            'protocol'  => 'http',
            'url'       => '.deviantart.com',
            'pos'       => 'first'
        ),
        'delicious'     => array(
            'protocol'  => 'https',
            'url'       => 'delicious.com/',
            'pos'       => 'last'
        ),
        'dribbble'      => array(
            'protocol'  => 'http',
            'url'       => 'dribbble.com/',
            'pos'       => 'last'
        ),
        'facebook'      => array(
            'protocol'  => 'http',
            'url'       => 'www.facebook.com/',
            'pos'       => 'last'
        ),
        'flickr'        => array(
            'protocol'  => 'http',
            'url'       => 'www.flickr.com/photos/',
            'pos'       => 'last'
        ),
        'foursquare'     => array(
            'protocol'  => 'https',
            'url'       => 'foursquare.com/',
            'pos'       => 'last'
        ),
        'friendfeed'     => array(
            'protocol'  => 'http',
            'url'       => 'friendfeed.com/',
            'pos'       => 'last'
        ),
        'github'        => array(
            'protocol'  => 'https',
            'url'       => 'github.com/',
            'pos'       => 'last'
        ),
        'googleplus'    => array(
            'protocol'  => 'https',
            'url'       => 'plus.google.com/',
            'pos'       => 'last'
        ),
        'instagram'     => array(
            'protocol'  => 'https',
            'url'       => 'instagram.com/',
            'pos'       => 'last'
        ),
        'lastfm'        => array(
            'protocol'  => 'http',
            'url'       => 'www.lastfm.fr/user/',
            'pos'       => 'last'
        ),
        'linkedin'      => array(
            'protocol'  => 'http',
            'url'       => 'www.linkedin.com/pub/',
            'pos'       => 'last'
        ),
        'livejournal'   => array(
            'protocol'  => 'http',
            'url'       => '.livejournal.com',
            'pos'       => 'first'
        ),
        'myspace'       => array(
            'protocol'  => 'https',
            'url'       => 'new.myspace.com/',
            'pos'       => 'last'
        ),
        'picasa'        => array(
            'protocol'  => 'https',
            'url'       => 'picasaweb.google.com/',
            'pos'       => 'last'
        ),
        'pinterest'     => array(
            'protocol'  => 'http',
            'url'       => 'pinterest.com/',
            'pos'       => 'last'
        ),
        'reddit'        => array(
            'protocol'  => 'http',
            'url'       => 'www.reddit.com/user/',
            'pos'       => 'last'
        ),
        'slideshare'    => array(
            'protocol'  => 'http',
            'url'       => 'www.slideshare.net/',
            'pos'       => 'last'
        ),
        'soundcloud'    => array(
            'protocol'  => 'https',
            'url'       => 'soundcloud.com/',
            'pos'       => 'last'
        ),
        'spotify'       => array(
            'protocol'  => 'http',
            'url'       => 'open.spotify.com/user/',
            'pos'       => 'last'
        ),
        'stackoverflow' => array(
            'protocol'  => 'http',
            'url'       => 'stackoverflow.com/users/',
            'pos'       => 'last'
        ),
        'stumbleupon'   => array(
            'protocol'  => 'http',
            'url'       => 'www.stumbleupon.com/stumbler/',
            'pos'       => 'last'
        ),
        'tumblr'        => array(
            'protocol'  => 'http',
            'url'       => '.tumblr.com',
            'pos'       => 'first'
        ),
        'twitter'       => array(
            'protocol'  => 'https',
            'url'       => 'twitter.com/',
            'pos'       => 'last'
        ),
        'viadeo'        => array(
            'protocol'  => 'http',
            'url'       => 'www.viadeo.com/fr/profile/',
            'pos'       => 'last'
        ),
        'vimeo'         => array(
            'protocol'  => 'http',
            'url'       => 'vimeo.com/',
            'pos'       => 'last'
        ),
        'wordpress'     => array(
            'protocol'  => 'http',
            'url'       => '.wordpress.com',
            'pos'       => 'first'
        ),
        'youtube'       => array(
            'protocol'  => 'http',
            'url'       => 'www.youtube.com/',
            'pos'       => 'last'
        )
    );

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getHosts()
    {
        return $this->hosts;
    }

    /**
     * @param $host
     *
     * @return array
     */
    public function findHost($host)
    {
        return array_keys($this->hosts, $host);
    }
}
