echo "rebuilding database ..."
bin/console doctrine:schema:drop -n -q --force --full-database &&
rm src/Migrations/*.php &&
bin/console make:migration &&
bin/console doctrine:migrations:migrate -n -q &&
bin/console doctrine:fixtures:load -n -q
