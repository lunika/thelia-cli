What is Thelia-cli?
--------------

A set of tools for controlling Thelia installations from the command line.

Requirements
------------

* PHP >= 5.3
* Thelia >= 1.4

Installing
----------

**Via GIT:**

```sh
git clone --recursive git@github.com:Shine-neko/thelia-cli.git ~/git/thelia-cli
cd ~/git/thelia-cli
composer.phar install
sudo chmod a+x bin/thelia
```

You can replace `~/git/thelia-cli` with whatever you want.

You can add thelia to your PATH to use thelia directly in you thelia root directory like this : `thelia help` instead of `path/to/thelia-cli/bin/thelia help`


Using
-----

Go into a Thelia root folder:

```
cd /var/www/thelia/
```

Typing `path/to/thelia-cli/bin/thelia help` should show you an output similar to this:

```
Example usage:
	thelia core [version] ...
	thelia plugin [status|activate|deactivate|install|delete] ...
```

So this tells us which commands are installed: eg. google-sitemap, core, home, ...
Between brackets you can see their sub commands.

Let's for example try to install the hello dolly plugin from thelia.net:

```
thelia plugin:install hello-dolly
```

Output:

```
Installing Hello Dolly (1.5)

Downloading install package from http://thelia.net/IMG/plugins_thelia/hello-dolly.zip ...
Unpacking the package ...
Installing the plugin ...

Success: The plugin is successfully installed
```

Adding commands
---------------

Adding commands to thelia-cli is very easy. You can even add them from within your own plugin.
You can find more information about adding commands in the [Commands Cookbook](https://github.com/Shine-neko/thelia-cli/blob/master/README.md) on our Wiki.

**Please share the commands you make, issue a pull request to get them included in thelia-cli by default.**

**0.1**

- initial release

Contributors
------------

- [Contributor list](https://github.com/Shine-neko/thelia-cli/contributors)