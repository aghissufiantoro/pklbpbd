<?php

if ($argc != 2) {
    echo "Usage: php create_migration.php <migration_name>\n";
    exit(1);
}

$migration_name = $argv[1];
$timestamp = date('YmdHis');
$filename = "{$timestamp}_{$migration_name}.php";

$template = <<<EOT
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_{$migration_name} extends CI_Migration {

    public function up()
    {
        // Add your migration code here
    }

    public function down()
    {
        // Add your rollback code here
    }
}

EOT;

file_put_contents("application/migrations/{$filename}", $template);
echo "Migration file created: application/migrations/{$filename}\n";
