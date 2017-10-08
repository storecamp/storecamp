if [[ $1 == 'run' ]]; then
    cd laradock && sudo docker-compose exec workspace bash && cd ../
fi

if [[ $1 == 'down' ]]; then
    cd laradock && sudo docker-compose down && cd ../
fi

if [[ $1 == 'up' ]]; then
    cd laradock && sudo docker-compose up -d nginx php-fpm mailhog mariadb elasticsearch redis memcached  && cd ../
fi
