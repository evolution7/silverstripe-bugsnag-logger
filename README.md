# Silverstripe Bugsnag Logger #

The Silverstripe Bugsnag Logger sends your error notifications to [Bugsnag](http://bugsnag.com).

## Compatibility ##
Tested to work with both Silverstripe 2.4 and 3.x applications.

## Installation ##

The recommended way is using [Composer](http://getcomposer.org/). 

Add this repository to your project's `composer.json` file

```json
"repositories": [
{
	"type": "vcs",
	"url": "https://github.com/evolution7/silverstripe-bugsnag-logger"
}
],
"require": {
	"evolution7/bugsnag-logger": "dev-master"
}
```

If there isn't a `composer.lock` file already, you can simply run
```shell
$ composer install
```
Otherwise, to install this library only, run the following command to avoid updating other dependencies
```shell
$ composer update evolution7/bugsnag-logger
```

The required [bugsnag-php](https://github.com/bugsnag/bugsnag-php) library should also be installed into `vendor/bugsnag/bugsnag/` under your project root directory. You should verify if the bugsnag autoloader has been correctly included by looking at `bugsnag-logger/code/BugsnagLogger.php`.

Alternatively, you can import the repository as a submodule into your project if you choose not to use composer.

* `git submodule add https://github.com/evolution7/silverstripe-bugsnag-logger bugsnag-logger`
* `git submodule update --recursive --init`

## Usage ##

After installation, all you need to do is add the following line to your _config.php to enable the Bugsnag Logger.

`E7_BugsnagLogger::enableWithApiKey(API-KEY-HERE);`

## Advanced Usage ##
### Client configuration ###
Calling the `enableWithApiKey` method will return the Bugsnag_Client object from the official [bugsnag-php](https://github.com/bugsnag/bugsnag-php) library. To see what is possible with that, please see the documentation on their Github page.

### Release stages ###
Bugsnag allows you to determine which release stage you are currently in, the Bugsnag Logger uses a ReleaseStage class for this which determines this based on the path, but it is possible to override this by providing your own ReleaseStage class as an optional second parameter when calling `enableWithApiKey`. This class will have to implement the ReleaseStageInterface to ensure it has the required methods.

`E7_BugsnagLogger::enableWithApiKey(API-KEY-HERE, new CustomReleaseStage());`

## Contributing ##

* Fork it on [Github](https://github.com/evolution7/silverstripe-bugsnag-logger)
* Make the changes you'd like to see
* Make a pull request
* Thanks!
