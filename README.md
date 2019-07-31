# DigitalOcean Spaces Storage Driver

This October CMS plugin allows you to use Aliyun OSS as a filesystem on your installation.

## Requirements

To use Aliyun OSS, you need to have a Aliyun account. After creating a Bucket and Bucket Access Key, you will have access to your *Access Key ID* and *Secret Access Key* that lets you use the API. 

## Plugin Settings

The plugin is configured in your October CMS `filesystems.php` and `cms.php`.

### filesystems.php

Edit your `filesystems.php` to add a disk "backblaze" that uses the `aliyun_oss` driver:

```php
return [

  ...

  'disks' => [
    'digitalocean' => [
      'driver' => 'aliyun_oss',
      'key'    => 'XXXXXXXXXXXXXXXXXXXX',
      'secret' => 'xxxXxXX+XxxxxXXxXxxxxxxXxxXXXXXXXxxxX9Xx',
      'region' => '<oss region>',
			'space'  => '<your bucket name>'
    ],
  ],

  ...

];
```

### cms.php

Edit your `cms.php` to configure the media manager to use your "digitalocean" disk:

```php
return [

  ...

  'storage' => [
    'media' => [
      'disk'   => 'bucket',
      'folder' => 'media',
      'path'   => 'https://<your bucket name>.<oss region>.aliyun.com/media'
    ],
  ],

  ...

];
```

## Change Log

* 1.0.1 - First version

## TODO

* All done!