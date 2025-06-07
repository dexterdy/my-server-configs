for dir in */; do
    /bin/cp -rf "$dir/*" "/home/$dir/$dir-app";
    chown -R $dir:$dir "/home/$dir/$dir-app";
end