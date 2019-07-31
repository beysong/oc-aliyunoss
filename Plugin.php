<?php namespace Beysong\AliyunOss;

use Storage;
use Aws\S3\S3Client;
use Beysong\AliyunOss\Classes\AliyunOssAdapter;
use League\Flysystem\Filesystem;

use System\Classes\PluginBase;

/**
 * Plugin class for Aliyun OSS Driver
 *
 * @author beysong
 */
class Plugin extends PluginBase {

	/**
	 * @var array Plugin dependencies
	 */
	public $require = ['October.Drivers'];

    /**
     * {@inheritDoc}
     */
    public function boot() {
        Storage::extend('aliyun_oss', function ($app, $config) {
            $client = new S3Client([
							'credentials' => [
								'key'    => $config['key'],
								'secret' => $config['secret'],
							],
							'version' => 'latest',
							'region' => $config['region'],
							'endpoint' => 'https://'.$config['region'].'.aliyuncs.com',
						]);

						$adapter = new AliyunOssAdapter($client, $config['space']);
						
            return new Filesystem($adapter);
        });
    }
}
