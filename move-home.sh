for dir in *; do
    if [ -d $dir ]; then
        mkdir -p "home/$dir/$dir-app"
        /bin/cp -rf "$dir/." "/home/$dir/$dir-app"
        chown -R $dir:$dir "/home/$dir/$dir-app"
    fi
done