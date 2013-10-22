# Silverstripe Bugsnag Logger #

The Silverstripe Bugsnag Logger sends your error notifications to [Bugsnag](http://bugsnag.com).

## Installation ##

Currently, the easiest way is to import the repository as a submodule into your project and make sure you run `git submodule update --recursive --init` afterwards.

## Usage ##

After installation, all you need to do is add the following line to your _config.php to enable the Bugsnag Logger.

`E7_BugsnagLogger::enableWithApiKey(API-KEY-HERE);`

## Advanced Usage ##
### Client configuration ###
Calling the `enableWithApiKey` method will return the Bugsnag_Client object from the official [bugsnag-php](https://github.com/bugsnag/bugsnag-php) library. To see what is possible with that, please see the documentation on their Github page.

### Release stages ###
Bugsnag allows you to determine which release stage you are currently in, the Bugsnag Logger uses a ReleaseStage class for this which determines this based on the path, but it is possible to override this by providing your own ReleaseStage class as an optional second parameter when calling `enableWithApiKey`. This class will have to implement the ReleaseStageInterface to ensure it has the required methods.

`E7_BugsnagLogger::enableWithApiKey(API-KEY-HERE, new CustomReleaseStage());`


