<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/10
 * Time: 12:17 PM
 */


class A{
    protected function registerAuthProvider()
    {
        $this->app->singleton('tymon.jwt.provider.auth', function () {
            return $this->getConfigInstance('providers.auth');
        });
    }

    protected function getConfigInstance($key)
    {
        $instance = $this->config($key);

        if (is_string($instance)) {
            return $this->app->make($instance);
        }

        return $instance;
    }
}
