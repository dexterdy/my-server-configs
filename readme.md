# nextcloud with podman + kubernetes

I followed [this](https://help.nextcloud.com/t/tutorial-for-running-nextcloud-in-rootless-podman-with-mariadb-redis-caddy-webserver-all-behind-a-caddy-reverse-proxy/159216) guide and made kubernetes files for this configuration to make it easy to replicate and maintain

Setup:

create the following folders:
```shell
mkdir YOUR_STORAGE_DRIVE_LOCATION/nextcloud-data
mkdir -p ./nextcloud/{db,caddy,html}
mkdir ./nextcloud/caddy/caddy_data
```

then create the following kubernetes secret files and change the passwords:

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