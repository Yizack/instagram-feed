# instagram-feed Example
For this example, we will be using [Glide.js](https://glidejs.com/), which will help us display our Instagram feed as slides on our website.

## Installation
Install using [Composer](https://getcomposer.org/):
```sh
composer require yizack/instagram-feed
```

## Feed page
Crate a new PHP file with the content of [`feed.php`](https://github.com/Yizack/instagram-feed/blob/master/example/feed.php).

## Feed page on your website
Use the code below, replace `http://your-site.com/feed.php` with your site URL and paste it on your site where you want your Instagram feed to appear.
```html
<iframe style="border: none;height: 100vh" src="http://your-site.com/feed" width="100%"></iframe>
```

## About the code
Paste here your Instagram Basic Display API long-lived access token.
```php
<?php
require "vendor/autoload.php";
use Yizack\InstagramFeed;

$feed = new InstagramFeed(
  "long-lived-access-token" // Your long-lived-access-token
);
?>
```

This code section will loop the `post(...)` method for each Instagram post found and adds a slide for each one.
```html
<div class="glide__track" data-glide-el="track">
  <ul class="glide__slides">
<?php
foreach($feed->getFeed() as $value) {
    $username = $value["username"];
    $permalink = $value["permalink"];
    $timestamp = $value["timestamp"];
    $caption = "";

    if(isset($value["caption"])) {
      $caption = $value["caption"];
    }

?>
    <li class="glide__slide"><?= post($username, $permalink, $caption, $timestamp); ?></li>
<?php
}
?>
      
  </ul>
</div>
```

HTML **Glide.js** slide arrows.
```html
<div class="glide__arrows" data-glide-el="controls">
  <span class="glide__arrow glide__arrow--left" data-glide-dir="<">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
    </svg>
  </span>
  <span class="glide__arrow glide__arrow--right" data-glide-dir=">">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
    </svg>
  </span>
</div>
```

Page and **Glide.js** arrows CSS styling in `<head>`.
```html
<style>
  html, body {
    height: fit-content;
    overflow-y: hidden;
    overflow-x: hidden;
    background: transparent;
    margin: 0;
    -webkit-tap-highlight-color: transparent;
  }
  
  iframe {
    min-width: 0;
    margin: auto!important;
  }

  .glide {
    margin-top: -62.6px;
  }

  .glide__arrow {
    position: absolute;
    display: block;
    padding: 10px;
    cursor: pointer;
    background: #fff;
    border-radius: 100%;
    border-style: solid;
    color: #262626;
    border-color: #dbdbdb;
  }

  .glide__arrow:hover {
    background: #262626;
    border-style: solid;
    color: #fff;
    border-color: #dbdbdb;
  }

  .glide__arrow--right {
    top: 300px;
    right: 0px;
  }

  .glide__arrow--left {
    top: 300px;
    left: 0px;
  }
</style>
```

Javascript **Glide.js** code settings.
```html
<script>
  new Glide(".glide", {
    perView: 3,
    bound: true,
    breakpoints: {
      968: {
        perView: 2
      },
      630: {
        perView: 1
      }
    }
  }).mount();
</script>
```
Inside `post(...)` method, there is a HTML `<blockquote>` code that is provided by instargam when you want to embed a post. I added the argument values of `$username`, `$permalink`, `$caption`, and `$timestamp` to match each post.

## Demo
Visit the demo on [instagram-feed.yizack.com/demo](https://instagram-feed.yizack.com/demo/).
