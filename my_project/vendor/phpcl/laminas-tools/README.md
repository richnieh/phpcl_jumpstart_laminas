# Laminas Tools v1.0.6
Tools to facilitate rapid app development using Laminas MVC.

## Installation
To get the latest version add the `--dev` flag.
```
composer require --dev phpcl/laminas-tools
```
Otherwise, specify your preferred version in the `composer.json` file:
```
{
    "require" : {
        "phpcl/laminas-tools" : "^1.0"
        ... other config not specified
    }
    ... other config not specified
}
```
and then run `composer install`.

## Followup
Have a look at the `vendor/bin` folder:
```
ls -l /path/to/project/vendor/bin
```
If you notice there are no links for `phpcl-laminas-tools`, run the following command:
```
cd /path/to/project
php vendor/phpcl/laminas-tools/utils/create_links.php
```

## Usage
From a command prompt or terminal window, change to the project root directory of your ZF 3 or Laminas MVC project.

### Linux
```
vendor/bin/phpcl-laminas-tools WHAT PATH NAME
```

### Windows
```
vendor/bin/phpcl-laminas-tools WHAT PATH NAME
```

### Params
| Param | Example | Description |
| :---: | :-----: | :---------- |
| WHAT  | module : controller : factory : controller-plugin : view-helper | Describes what component you want to build |
| PATH  | "/path/to/project" | Full path to your project root directory |
| NAME  | "Test"  | Name of the module you want to create, or |
|       | "Test\\Controller\\ListController" | Name of the controller you want to create, or |
|       | "Test\\Factory\\ListServiceFactory" | Name of the factory you want to create |
|       | "Test\\Controller\\Plugin\\NameOfPlugin" | Name of the controller plugin you want to create ("nameOf" becomes the alias) |
|       | "Test\\View\\Helper\\NameOfHelper" | Name of the view helper you want to create ("nameOf" becomes the alias) |

## Examples
These examples assume you are running from a command prompt / terminal window, and have changed to the root directory of your project.

### Creating a Module
As an example, to create a module "Test" on a Linux server:
```
vendor/bin/phpcl-laminas-tools module `pwd` Test
```

Here is what the tool does:
* Creates the module directory structure
* Creates a file `module/Test/src/Module.php`
* Create a controller `module/Test/src/Controller/IndexController.php`
* Creates a view template `/module/Test/view/test/index/index.phtml`
* Creates a config file `module/Test/config/module.config.php`
  * Adds a route `/test[/:action]` (where `action` is the name of any additional `xxxAction()` methods created in the controller)
  * Registers the controller with the framework

### Creating a Controller
As an example, to create a controller "Test\Controller\ListController" on a Windows server:
```
vendor/bin/phpcl-laminas-tools controller "C:\path\to\project" "Test\\Controller\\ListController"
```

Here is what the tool does:
* Creates a file `C:\path\to\project\module\Test\src\Controller\ListController.php`
* Creates a view template `C:\path\to\project\module\Test\view\test\list\index.phtml`
* Creates a config file `C:\path\to\project\module\Test\config\module.config.php`
  * Adds a route `/test-list[/:action]` (where `action` is the name of any additional `xxxAction()` methods created in the new controller)
  * Registers the new controller with the framework

### Creating a Factory
As an example, to create a factory "Test\Factory\ListServiceFactory" on Linux:
```
vendor/bin/phpcl-laminas-tools factory `pwd` "Test\\Factory\\ListServiceFactory"
```

The tool will then directly output the code for a generic factory named `ListServiceFactory`.  If you wish to pipe the output into a file, do this:
```
mkdir module/Test/src/Factory
vendor/bin/phpcl-laminas-tools.sh factory `pwd` "Test\\Factory\\ListServiceFactory" >module/Test/src/Factory/ListServiceFactory.php
```

### Creating a Controller Plugin
As an example, to create a controller plugin "Test\Controller\Plugin\ReallyCoolPlugin" on Linux:
```
vendor/bin/phpcl-laminas-tools controller-plugin `pwd` "Test\\Controller\\Plugin\\ReallyCoolPlugin"
```

Here is what the tool does:
* Creates a file `path\to\project\module\Test\src\Controller\Plugin\ReallyCoolPlugin.php`
* Adds to the module config file `\path\to\project\module\Test\config\module.config.php`
  * Registers the new controller plugin with the framework under the `controller_plugins => factories` key
  * Adds an alias `reallyCool` under  the `controller_plugins => aliases` key


### Creating a View Helper
As an example, to create a view helper "Test\View\Helper\ReallyCoolHelper" on Linux:
```
vendor/bin/phpcl-laminas-tools view-helper `pwd` "Test\\View\\Helper\\ReallyCoolHelper"
```

Here is what the tool does:
* Creates a file `path\to\project\module\Test\src\View\Helper\ReallyCoolHelper.php`
* Adds to the module config file `\path\to\project\module\Test\config\module.config.php`
  * Registers the new view helper with the framework under the `view_helpers => factories` key
  * Adds an alias `reallyCool` under  the `view_helpers => aliases` key


## Routes
When you create a new module:
* This route is defined for you: `/module` where `module` is the lower case name of the new module.
  * Example: you add a new module `Test`.  The new route will be `/test`.
* Any action methods added to the default controller `MODULE\Controller\IndexController` can be referenced using the name of the action method minus the suffix `Action`, all lowercase.
  * Example: you add a method `public function demoAction() {}` to `IndexController` in the `Test` module.  The new route will be: `/test/demo`.
When you create a new controller:
* This route is defined for you: `/MODULE-CTRL_SHORT` where `MODULE` is the lower case name of the new module and `CTRL_SHORT` is the "short" name of the controller (class name minus the suffix `Controller`, all lower case)
  * Example: you add a new controller `DemoController` to the `Test` module.  The new route will be: `/test-demo`.
* Any action methods added to the new controller can be referenced using the name of the action method minus the suffix `Action`, all lowercase.
  * Example: you add a method `public function whateverAction() {}` to `DemoController`.  The new route will be: `/test-demo/whatever`.

## IMPORTANT
* If you wish to generate a factory for a specific class, use the already-existing Laminas CLI tool `vendor/bin/generate-factory-for-class` instead.
* The PHP-CL Laminas Tools can be used to create a factory if the `generate-factory-for-class` command fails, or if the factory class you wish to create does not have resolvable type-hints.
* If you prefer, you can also simply download the file [`laminas-tools.phar`](https://github.com/phpcl/laminas_tools/raw/master/laminas-tools.phar)
  * Usage is the same: follow the examples above, but substitute `php laminas-tools.phar` in place of `vendor/bin/phpcl-laminas-tools`
