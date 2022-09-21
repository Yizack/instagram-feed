# instagram-feed
PHP library to retrieve Instagram profile feed, embed Instagram profile feed of your Instagram accounts on your website using PHP.\
(Live [Demo](https://instagram-feed.yizack.com/demo/))
[![Live Demo](https://yizack.com/images/instagram-feed/demo.gif)](https://instagram-feed.yizack.com/demo/)

## Requeriments
- PHP Hosting (with `composer` and `fopen()` support) [[Guide]](#php-hosting)
- Meta Developer App [[Guide]](#meta-developer-app)
- Instagram Basic Display API [[Guide]](#instagram-basic-display-api)

## Installation
- To install the library, make sure  you have Composer installed and in your command terminal run the following command:
```sh
composer require yizack/instagram-feed
```

## Use
Installing this library will allow you to use the class `InstagramFeed` just by importing the composer autoload.

- Import the composer autoload and initialize the `InstagramFeed` object.
```php
require 'vendor/autoload.php';

$feed = new Yizack\InstagramFeed(
  "long-lived-access-token", // Paste your long-lived-access-token here
);
```

- To get your Instagram feed array use the `getFeed()` function.
```php
$array = $feed->getFeed();
```

- Or loop it directly in a `foreach` method wherever you need it.
```php
foreach($feed->getFeed() as $value) {
    // your code
}
```

## Requeriments Guide

- ### PHP Hosting
  I think you can use any PHP Hosting unless it doesn't support `fopen()`.

- ### Meta Developer App
  In order to use the Instagram API, we must first create a Meta App. Follow the steps below to create a Meta App.
1. Go to [Meta for Developers site](https://developers.facebook.com/apps/create/), login and create App. Select the app type as **None**.
[![Meta App Step 1](https://yizack.com/images/instagram-feed/meta-app-1.jpg)](https://developers.facebook.com/)
2. Provide your App details.
[![Meta App Step 2](https://yizack.com/images/instagram-feed/meta-app-2.jpg)](https://developers.facebook.com/)
3. Look for **Instagram Basic Display product**, and click on **Set up** to use the Instagram API.
[![Meta App Step 3](https://yizack.com/images/instagram-feed/meta-app-3.jpg)](https://developers.facebook.com/)
4. Scroll down until you see an alert and click on **Settings** to update your App settings.
[![Meta App Step 4](https://yizack.com/images/instagram-feed/meta-app-4.jpg)](https://developers.facebook.com/)
5. Scroll down and click on thhe **Add Platform** button.
[![Meta App Step 5](https://yizack.com/images/instagram-feed/meta-app-5.jpg)](https://developers.facebook.com/)
6. Select the platform **Website**.
[![Meta App Step 6](https://yizack.com/images/instagram-feed/meta-app-6.jpg)](https://developers.facebook.com/)
7. Enter your **Site URL** and save changes.
[![Meta App Step 6](https://yizack.com/images/instagram-feed/meta-app-7.jpg)](https://developers.facebook.com/)

- ### Instagram Basic Display API
  Now it's time to authorize your instagram account.
1. Back to Products > Instagram > Basic Display. Create new App.
[![Instagram App Step 1](https://yizack.com/images/instagram-feed/instagram-app-1.jpg)](https://developers.facebook.com/)
2. Fill OAuth Redirect, Deauthorize Callback and Data Deletion Request URL with your site URL and save changes.
[![Instagram App Step 2](https://yizack.com/images/instagram-feed/instagram-app-2.jpg)](https://developers.facebook.com/)
3. Add Instagram testers.
[![Instagram App Step 3](https://yizack.com/images/instagram-feed/instagram-app-3.jpg)](https://developers.facebook.com/)
4. Enter your Instagram username and select your profile.
[![Instagram App Step 4](https://yizack.com/images/instagram-feed/instagram-app-4.jpg)](https://developers.facebook.com/)
5. Go to your Instagram account settings page > App and Websites > Tester invites, accept the invite.
[![Instagram App Step 5](https://yizack.com/images/instagram-feed/instagram-app-5.jpg)](https://developers.facebook.com/)
6. Back to Products > Instagram > Basic Display > User Token Generator, you Instagram account should appear in the list, then click **Generate Token** button for authorize and generate long-lived access token for Instagram.
[![Instagram App Step 6](https://yizack.com/images/instagram-feed/instagram-app-6.jpg)](https://developers.facebook.com/)
7. Login and authorize the App.
[![Instagram App Step 7](https://yizack.com/images/instagram-feed/instagram-app-7.jpg)](https://developers.facebook.com/)
8. Click on **I Understand** checkbox and copy the generated token.
[![Instagram App Step 8](https://yizack.com/images/instagram-feed/instagram-app-8.jpg)](https://developers.facebook.com/)
9. Paste your token in your code.
