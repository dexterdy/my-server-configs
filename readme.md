# nextcloud with podman + kubernetes

I followed [this](https://help.nextcloud.com/t/tutorial-for-running-nextcloud-in-rootless-podman-with-mariadb-redis-caddy-webserver-all-behind-a-caddy-reverse-proxy/159216) guide and made kubernetes files for this configuration to make it easy to replicate and maintain

Setup:

create the following folders:
```shell
mkdir ~/nextcloud-app
cd ~/nextcloud-app
mkdir -p ./{db,caddy,html,nextcloud_data}
mkdir ./caddy/caddy_data
```

next, in the nextcloud.yaml file, you will want to to a find and replace:
replace `/home/nextcloud` with `/home/<your_user>`

Then create the following kubernetes secret files and change the passwords:

```yaml
# ./nextcloud-db-secrets

apiVersion: v1
kind: Secret
metadata:
  name: nextcloud-db-secrets
type: Opaque
data:
  MYSQL_USER: nextcloud
  MYSQL_PASSWORD: YourPassword
  MYSQL_DATABASE: nextcloud
  MYSQL_ROOT_PASSWORD: YourPassword
```

```yaml
# ./nextcloud-redis-secrets

apiVersion: v1
kind: Secret
metadata:
  name: nextcloud-redis-secrets
type: Opaque
data:
  REDIS_HOST_PASSWORD: YourPassword
```

after that just

```shell
podman play kube ./nextcloud.yaml
```

And you have a working nextcloud! Follow the guide at the top for more detailed instructions on how to set up and access nextcloud

If you want to use the kube file, you should symlink it to the `~/.config/containers/systemd` directory and run `systemctl --user daemon-reload`, after which you can run `systemctl --user enable --now nextcloud`