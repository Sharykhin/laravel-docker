# Use xdebug with docker on macOS and PhpStorm

To use xdebug with macOS and docker is quite, let´s call it tricky ;)

The following steps need to be proceed to get it working:

1. use the config from the xdebug.ini wihtin your docker web container. **Important**: set remote_connect_back to off
2. set up an alias for your local interface (lo)

To bring up the alias at startup, you can either (sudo may be needed here):

- manually place the file `com.manuelselbach.docker_10254254254_alias.plist` into directory: `/Library/LaunchDaemons/`

- Or use the script `set_and_install_autorun_alias_for_lo.sh`

After all that, just configure your PhpStorm:

1. set port for xdebug `Preferences -> Languages & Frameworks -> PHP -> Debug | Xdebug: Debug port = 9005`
2. configure a configuration in the toolbar
  - use PHP remote Debug
  - add a server to your domain (without protocoll like http:// or https://)
  - set port for http / https (not the xdebug port here)
  - select Debugger: Xdebug
  - if needed: set path mappings
3. set Ide key (session id): to PHPSTORM

Happy debugging with docker!

![](http://i.giphy.com/zPVRKhPsUP5lK.gif)

##### Files:

`com.manuelselbach.docker_10254254254_alias.plist`
```xml
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
    <key>Label</key>
    <string>com.manuelselbach.docker_10254254254_alias</string>
    <key>ProgramArguments</key>
    <array>
        <string>ifconfig</string>
        <string>lo0</string>
        <string>alias</string>
        <string>10.254.254.254</string>
    </array>
    <key>RunAtLoad</key>
    <true/>
</dict>
</plist>
```

`set_and_install_autorun_alias_for_lo.sh`

```bash 
#!/bin/bash

ifconfig lo0 alias 10.254.254.254

curl https://gist.githubusercontent.com/manuelselbach/8a214ae012964b1d49d9fb019f5f5d7b/raw/fc57a5c8f13c6f9deb64d70f992a29487c49e494/com.manuelselbach.docker_10254254254_alias.plist  >> /Library/LaunchDaemons/com.manuelselbach.docker_10254254254_alias.plist
```

`xdebug.ini`

```bash
# xdebug config within docker container
zend_extension=/path/to/xdebug.so
xdebug.remote_enable=1
xdebug.remote_autostart=1
xdebug.remote_connect_back=off
xdebug.remote_host=10.254.254.254
xdebug.remote_port=9005
xdebug.idekey=PHPSTORM
xdebug.max_nesting_level=1500
```