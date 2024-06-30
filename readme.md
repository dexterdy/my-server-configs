# nextcloud with podman + kubernetes

I followed [this](https://help.nextcloud.com/t/tutorial-for-running-nextcloud-in-rootless-podman-with-mariadb-redis-caddy-webserver-all-behind-a-caddy-reverse-proxy/159216) guide and made kubernetes files for this configuration to make it easy to replicate and maintain

Setup:

execute the following commands:
```shell
mkdir ~/nextcloud-app
cd ~/nextcloud-app
git clone https://github.com/dexterdy/nextcloud-kubernetes-podman-config.git .
mkdir -p ./{db,caddy,html,nextcloud_data}
mkdir ./caddy/caddy_data
```

Then create the following kubernetes secret files and change the passwords:

```yaml
# ./nextcloud-db-secrets

apiVersion: v1
kind: Secret
metadata:
  name: nextcloud-db-secrets
type: Opaque
stringData:
  MYSQL_USER: nextcloud
  MYSQL_PASSWORD: YourDBPassword
  MYSQL_DATABASE: nextcloud
  MYSQL_ROOT_PASSWORD: YourDBRootPassword
```

```yaml
# ./nextcloud-redis-secrets

apiVersion: v1
kind: Secret
metadata:
  name: nextcloud-redis-secrets
type: Opaque
stringData:
  REDIS_HOST_PASSWORD: YourRedisPassword
```

after that just

```shell
podman play kube ./nextcloud-db-secrets
podman play kube ./nextcloud-redis-secrets
podman play kube ./nextcloud.yaml
```

And you have a working nextcloud! Follow the guide at the top for more detailed instructions on how to set up and access nextcloud

If you want to use the kube file, you should symlink it to the `~/.config/containers/systemd` directory and run `systemctl --user daemon-reload`, after which you can run `systemctl --user start nextcloud`