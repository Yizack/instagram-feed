# instagram-feed

[![Packagist](https://img.shields.io/packagist/v/yizack/instagram-feed.svg)](https://packagist.org/packages/yizack/instagram-feed)

PHP library to retrieve an Instagram profile feed, embed the feed of your authorized Instagram accounts on your website. The library uses the Instagram API with auto-refreshing access token support.

(Live [Demo](https://instagram-feed.yizack.com/demo/))

[![Live Demo](https://yizack.com/images/instagram-feed/demo.gif)](https://instagram-feed.yizack.com/demo/)

# Limitations

- Only available for Instagram Business or Creator accounts. (Since December 4th, 2024. [Read the Basic Display API deprecation note](https://developers.facebook.com/blog/post/2024/09/04/update-on-instagram-basic-display-api/).)

## Requeriments

- PHP Hosting (with `composer`, `file_get_contents()`, `file_put_contents()` support)
- Meta Developer App [[Guide]](#meta-developer-app)
- Instagram API [[Guide]](#instagram-api)

## Installation

To install the library, make sure you have [Composer](https://getcomposer.org/) installed and using your command terminal run the following:

```sh
composer require yizack/instagram-feed
```

## Use

Installing this library will allow you to use the `InstagramFeed` class by simply importing the composer autoload.

Import the composer autoload, use the namespace `Yizack\InstagramFeed` and initialize the `InstagramFeed` object.

```php
require "vendor/autoload.php";
use Yizack\InstagramFeed;

$feed = new InstagramFeed(
  "long-lived-access-token" // Paste your long-lived-access-token here
);
```

To retrieve your Instagram feed array use the `getFeed()` function.

```php
$array = $feed->getFeed();
```

Or loop it directly in a `foreach` method wherever you need it.

```php
foreach ($feed->getFeed() as $value) {
    // your code
}
```

The `getFeed()` function also accepts an array of fields to be returned.

```php
$array = $feed->getFeed(["username", "permalink", "timestamp", "caption", "media_url"]);
```

For a list of all available fields see: https://developers.facebook.com/docs/instagram-platform/reference/instagram-media#fields

## About the code

### `InstagramFeed` constructor arguments

| Argument   | Type   | Description                                                                     | Optional | Default value  |
|------------|--------|---------------------------------------------------------------------------------|----------|----------------|
| `token`    | string | Your Instagram `long-lived-access-token`.                         | No       |                |
| `path`     | string | The path where the updated file will be saved on your server.                   | Yes      | `ig_token`     |
| `filename` | string | The name of the file in which the date of the last token update will be stored. | Yes      | `updated.json` |

### `getFeed()` function
Updates the date of the last token update and requests feed data from an Instagram account.


Returns an array with the data of the last 25 posts with the following data for each one:

| Key         | Description                |
|-------------|----------------------------|
| `username`  | Instagram username.        |
| `permalink` | Instagram post permalink.  |
| `timestamp` | Instagram post timestamp.  |
| `caption`   | Instagram post caption.    |
| `id`        | Instagram post identifier. |

### Long-Lived Access token

This approach uses **Long-Lived Access** Tokens obtained by authorizing your Instagram account with your Meta App.

Since Long-lived tokens are valid for 60 days and can be refreshed as long as they are at least 24 hours old and not expired, the `getFeed()` method will refresh your token everytime it is been called if 24 hours have passed.

Tokens that have not been refreshed in 60 days will expire and can no longer be refreshed, so be sure to visit often the site where you placed the feed.

## Example of use

Check the [`example`](/example/) folder for details.

## Requeriments Guide

### PHP Hosting

You can use any PHP Hosting unless it does not support `file_get_contents()` and `file_put_contents()`.

### Meta Developer App

In order to use the **Instagram API**, we must first create a **Meta App**. Follow the steps below to create a Meta App.

1. Go to [Meta for Developers site](https://developers.facebook.com/apps/create/), login and create App. Select the app type as **Business**.
[![Meta App Step 1](https://github.com/user-attachments/assets/0e13c938-d479-43aa-a4cd-db95c89c6107)](https://developers.facebook.com/)

2. Provide your App details.
[![Meta App Step 2](https://github.com/user-attachments/assets/805ab216-4ac6-4be0-95c5-ef5a49a6fa74)](https://developers.facebook.com/)

### Instagram API

Now it is time to authorize your Instagram Business or Creator account.

1. Look for **Instagram** product, and click on **Set up** to use the Instagram API.
[![Instagram API Step 1](https://github.com/user-attachments/assets/e6f5eac4-dfe9-4f3e-8177-6ad903b81539)](https://developers.facebook.com/)

2. In the **Generate access tokens** section, Click on the **Add account** button.
[![Instagram API Step 2](https://github.com/user-attachments/assets/0a7ab7d5-da79-4a45-a808-5a1f7c7e1339)](https://developers.facebook.com/)

3. Login using your Instagram Business or Creator account and allow the permissions.
[![Instagram API Step 3](https://github.com/user-attachments/assets/597b3077-21ee-44ad-9eaa-259e49b48b87)](https://developers.facebook.com/)

4. Click on **Generate token**, allow the permissions, and copy the generated token inside the code.
[![Instagram API Step 4](https://github.com/user-attachments/assets/0a0982e2-c7b7-488c-8942-028fdc4bae36)](https://developers.facebook.com/)

5. Paste your token in your code.

## Repository

[Yizack/instagram-feed](https://github.com/Yizack/instagram-feed) on GitHub.
