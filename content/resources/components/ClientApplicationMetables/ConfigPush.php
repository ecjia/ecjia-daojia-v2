<?php
/**
 * Created by PhpStorm.
 * User: royalwang
 * Date: 2019-02-22
 * Time: 13:28
 */

namespace Ecjia\Resources\Components\ClientApplicationMetables;

use Ecjia\App\Client\ApplicationConfigFactory\ApplicationConfig;
use Ecjia\App\Client\ApplicationConfigFactory\ApplicationConfigOptions;
use RC_Uri;
use RC_Hook;

class ConfigPush extends ApplicationConfig
{

    protected $code = 'config_push';

    protected $name;

    protected $link;

    protected $clients = [
        'iphone',
        'android'
    ];

    /**
     * @var ApplicationConfigOptions
     */
    protected $options;

    public function __construct()
    {
        $this->name = __('推送配置', 'client');
    }


    public function getLink()
    {
        return RC_Uri::url('client/admin_push_config/config_push', [
            'code' => $this->options->getPlatform()->getCode(),
            'app_id' => $this->options->getAppId(),
        ]);
    }


    public function handleClientMenus()
    {
        RC_Hook::add_action('client_platform_client_menus', function() {
            echo $this->displayMobilePlatformClientMenus('client/admin_push_config/config_push');
        });
    }

}