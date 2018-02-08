!/bin/sh

git commit -am "$1" && git push

ssh zhipeng.zhou@blog.zhouzhipeng.com "docker exec  wordpress  bash -c 'cd wp-content/themes/Kratos && git pull' "
