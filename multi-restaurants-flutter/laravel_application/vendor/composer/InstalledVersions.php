<?php











namespace Composer;

use Composer\Autoload\ClassLoader;
use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => 'dev-main',
    'version' => 'dev-main',
    'aliases' => 
    array (
    ),
    'reference' => 'f36e8011ad858681564e0b2c623e9a88576382b1',
    'name' => 'laravel/laravel',
  ),
  'versions' => 
  array (
    'anlutro/l4-settings' => 
    array (
      'pretty_version' => 'v0.7.3',
      'version' => '0.7.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '4516b37db1be319a04ef881709f104e3b7dc66eb',
    ),
    'barryvdh/laravel-debugbar' => 
    array (
      'pretty_version' => 'v3.3.3',
      'version' => '3.3.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '57f2219f6d9efe41ed1bc880d86701c52f261bf5',
    ),
    'barryvdh/laravel-dompdf' => 
    array (
      'pretty_version' => 'v0.8.6',
      'version' => '0.8.6.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd7108f78cf5254a2d8c224542967f133e5a6d4e8',
    ),
    'benwilkins/laravel-fcm-notification' => 
    array (
      'pretty_version' => 'v4.0.1',
      'version' => '4.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4f5d35f3ed692fc61c6156f141811816b8745976',
    ),
    'caouecs/laravel-lang' => 
    array (
      'pretty_version' => '3.0.62',
      'version' => '3.0.62.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fcb8cec051b175278e0a9efa440f0b1033d12dd7',
    ),
    'cordoval/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'davedevelopment/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'dnoegel/php-xdg-base-dir' => 
    array (
      'pretty_version' => 'v0.1.1',
      'version' => '0.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8f8a6e48c5ecb0f991c2fdcf5f154a47d85f9ffd',
    ),
    'doctrine/cache' => 
    array (
      'pretty_version' => '1.10.1',
      'version' => '1.10.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '35a4a70cd94e09e2259dfae7488afc6b474ecbd3',
    ),
    'doctrine/dbal' => 
    array (
      'pretty_version' => '2.10.2',
      'version' => '2.10.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'aab745e7b6b2de3b47019da81e7225e14dcfdac8',
    ),
    'doctrine/event-manager' => 
    array (
      'pretty_version' => '1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '629572819973f13486371cb611386eb17851e85c',
    ),
    'doctrine/inflector' => 
    array (
      'pretty_version' => '1.4.3',
      'version' => '1.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '4650c8b30c753a76bf44fb2ed00117d6f367490c',
    ),
    'doctrine/instantiator' => 
    array (
      'pretty_version' => '1.3.1',
      'version' => '1.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f350df0268e904597e3bd9c4685c53e0e333feea',
    ),
    'doctrine/lexer' => 
    array (
      'pretty_version' => '1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e864bbf5904cb8f5bb334f99209b48018522f042',
    ),
    'dompdf/dompdf' => 
    array (
      'pretty_version' => 'v0.8.5',
      'version' => '0.8.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '6782abfc090b132134cd6cea0ec6d76f0fce2c56',
    ),
    'dragonmantank/cron-expression' => 
    array (
      'pretty_version' => 'v2.3.0',
      'version' => '2.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '72b6fbf76adb3cf5bc0db68559b33d41219aba27',
    ),
    'egulias/email-validator' => 
    array (
      'pretty_version' => '2.1.17',
      'version' => '2.1.17.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ade6887fd9bd74177769645ab5c474824f8a418a',
    ),
    'erusev/parsedown' => 
    array (
      'pretty_version' => '1.7.4',
      'version' => '1.7.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cb17b6477dfff935958ba01325f2e8a2bfa6dab3',
    ),
    'fideloper/proxy' => 
    array (
      'pretty_version' => '4.3.0',
      'version' => '4.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ec38ad69ee378a1eec04fb0e417a97cfaf7ed11a',
    ),
    'filp/whoops' => 
    array (
      'pretty_version' => '2.7.2',
      'version' => '2.7.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '17d0d3f266c8f925ebd035cd36f83cf802b47d4a',
    ),
    'fzaninotto/faker' => 
    array (
      'pretty_version' => 'v1.9.1',
      'version' => '1.9.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fc10d778e4b84d5bd315dad194661e091d307c6f',
    ),
    'guzzlehttp/guzzle' => 
    array (
      'pretty_version' => '6.5.4',
      'version' => '6.5.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a4a1b6930528a8f7ee03518e6442ec7a44155d9d',
    ),
    'guzzlehttp/promises' => 
    array (
      'pretty_version' => 'v1.3.1',
      'version' => '1.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a59da6cf61d80060647ff4d3eb2c03a2bc694646',
    ),
    'guzzlehttp/psr7' => 
    array (
      'pretty_version' => '1.6.1',
      'version' => '1.6.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '239400de7a173fe9901b9ac7c06497751f00727a',
    ),
    'hamcrest/hamcrest-php' => 
    array (
      'pretty_version' => 'v2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '776503d3a8e85d4f9a1148614f95b7a608b046ad',
    ),
    'illuminate/auth' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/broadcasting' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/bus' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/cache' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/config' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/console' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/container' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/cookie' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/database' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/encryption' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/events' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/filesystem' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/hashing' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/http' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/log' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/mail' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/notifications' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/pagination' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/pipeline' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/queue' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/redis' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/routing' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/session' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/support' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/translation' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/validation' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/view' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'infyomlabs/adminlte-templates' => 
    array (
      'pretty_version' => '5.6.x-dev',
      'version' => '5.6.9999999.9999999-dev',
      'aliases' => 
      array (
      ),
      'reference' => 'b38bddec0dd9f3bcfd0f6a9adfffbeb20437e46c',
    ),
    'intervention/image' => 
    array (
      'pretty_version' => '2.5.1',
      'version' => '2.5.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'abbf18d5ab8367f96b3205ca3c89fb2fa598c69e',
    ),
    'jakub-onderka/php-console-color' => 
    array (
      'pretty_version' => 'v0.2',
      'version' => '0.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd5deaecff52a0d61ccb613bb3804088da0307191',
    ),
    'jakub-onderka/php-console-highlighter' => 
    array (
      'pretty_version' => 'v0.4',
      'version' => '0.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '9f7a229a69d52506914b4bc61bfdb199d90c5547',
    ),
    'kodova/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'kylekatarnls/laravel-carbon-2' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '0b68e0454d8e17b31cc42038dda8b7faef8055b3',
    ),
    'laracasts/flash' => 
    array (
      'pretty_version' => '3.1',
      'version' => '3.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '150d4348477db31b9a93ccd07f713e3d0513b3bf',
    ),
    'laravel/cashier' => 
    array (
      'pretty_version' => 'v7.2.2',
      'version' => '7.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd450aa31f1b5e9f9618088ebe9fa4c2d77962d5d',
    ),
    'laravel/framework' => 
    array (
      'pretty_version' => 'v5.8.38',
      'version' => '5.8.38.0',
      'aliases' => 
      array (
      ),
      'reference' => '78eb4dabcc03e189620c16f436358d41d31ae11f',
    ),
    'laravel/laravel' => 
    array (
      'pretty_version' => 'dev-main',
      'version' => 'dev-main',
      'aliases' => 
      array (
      ),
      'reference' => 'f36e8011ad858681564e0b2c623e9a88576382b1',
    ),
    'laravel/socialite' => 
    array (
      'pretty_version' => 'v3.4.0',
      'version' => '3.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '28368c6fc6580ca1860f9b9a7f8deac1aa7d515a',
    ),
    'laravel/tinker' => 
    array (
      'pretty_version' => 'v1.0.10',
      'version' => '1.0.10.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ad571aacbac1539c30d480908f9d0c9614eaf1a7',
    ),
    'laravelcollective/html' => 
    array (
      'pretty_version' => 'v5.8.1',
      'version' => '5.8.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '3a1c9974ea629eed96e101a24e3852ced382eb29',
    ),
    'league/flysystem' => 
    array (
      'pretty_version' => '1.0.69',
      'version' => '1.0.69.0',
      'aliases' => 
      array (
      ),
      'reference' => '7106f78428a344bc4f643c233a94e48795f10967',
    ),
    'league/fractal' => 
    array (
      'pretty_version' => '0.19.2',
      'version' => '0.19.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '06dc15f6ba38f2dde2f919d3095d13b571190a7c',
    ),
    'league/glide' => 
    array (
      'pretty_version' => '1.5.0',
      'version' => '1.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a5477e9e822ed57b39861a17092b92553634932d',
    ),
    'league/oauth1-client' => 
    array (
      'pretty_version' => '1.7.0',
      'version' => '1.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fca5f160650cb74d23fc11aa570dd61f86dcf647',
    ),
    'maatwebsite/excel' => 
    array (
      'pretty_version' => '3.1.19',
      'version' => '3.1.19.0',
      'aliases' => 
      array (
      ),
      'reference' => '96527a9ebc2e79e9a5fa7eaef7e23c9e9bcc587c',
    ),
    'maddhatter/laravel-fullcalendar' => 
    array (
      'pretty_version' => 'v1.3.0',
      'version' => '1.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '6502ee3eee2d506d58fa37864af8f2003c9aaca1',
    ),
    'maennchen/zipstream-php' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '6373eefe0b3274d7b702d81f2c99aa977ff97dc2',
    ),
    'markbaker/complex' => 
    array (
      'pretty_version' => '1.4.8',
      'version' => '1.4.8.0',
      'aliases' => 
      array (
      ),
      'reference' => '8eaa40cceec7bf0518187530b2e63871be661b72',
    ),
    'markbaker/matrix' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '5348c5a67e3b75cd209d70103f916a93b1f1ed21',
    ),
    'maximebf/debugbar' => 
    array (
      'pretty_version' => 'v1.16.3',
      'version' => '1.16.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '1a1605b8e9bacb34cc0c6278206d699772e1d372',
    ),
    'mockery/mockery' => 
    array (
      'pretty_version' => '1.3.1',
      'version' => '1.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f69bbde7d7a75d6b2862d9ca8fab1cd28014b4be',
    ),
    'monolog/monolog' => 
    array (
      'pretty_version' => '1.25.4',
      'version' => '1.25.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '3022efff205e2448b560c833c6fbbf91c3139168',
    ),
    'myclabs/deep-copy' => 
    array (
      'pretty_version' => '1.9.5',
      'version' => '1.9.5.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b2c28789e80a97badd14145fda39b545d83ca3ef',
      'replaced' => 
      array (
        0 => '1.9.5',
      ),
    ),
    'myclabs/php-enum' => 
    array (
      'pretty_version' => '1.7.6',
      'version' => '1.7.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '5f36467c7a87e20fbdc51e524fd8f9d1de80187c',
    ),
    'nesbot/carbon' => 
    array (
      'pretty_version' => '2.31.0',
      'version' => '2.31.0.0',
      'aliases' => 
      array (
        0 => '1.39.0',
      ),
      'reference' => 'bbc0ab53f41a4c6f223c18efcdbd9bc725eb5d2d',
    ),
    'nikic/php-parser' => 
    array (
      'pretty_version' => 'v4.5.0',
      'version' => '4.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '53c2753d756f5adb586dca79c2ec0e2654dd9463',
    ),
    'nunomaduro/collision' => 
    array (
      'pretty_version' => 'v2.1.1',
      'version' => '2.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b5feb0c0d92978ec7169232ce5d70d6da6b29f63',
    ),
    'opis/closure' => 
    array (
      'pretty_version' => '3.5.4',
      'version' => '3.5.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '1d0deef692f66dae5d70663caee2867d0971306b',
    ),
    'orangehill/iseed' => 
    array (
      'pretty_version' => 'v2.6.3',
      'version' => '2.6.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '454d4aa0eacedf02d7bcbb2633e363170d3db49b',
    ),
    'org_heigl/ghostscript' => 
    array (
      'pretty_version' => '2.3.1',
      'version' => '2.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '2bcd115f047589c28243a66e6bbea993fc91da21',
    ),
    'overtrue/laravel-lang' => 
    array (
      'pretty_version' => '3.0.16',
      'version' => '3.0.16.0',
      'aliases' => 
      array (
      ),
      'reference' => '44917b643ca49d1bbac54f205cd6a51f2e71908f',
    ),
    'paragonie/random_compat' => 
    array (
      'pretty_version' => 'v9.99.99',
      'version' => '9.99.99.0',
      'aliases' => 
      array (
      ),
      'reference' => '84b4dfb120c6f9b4ff7b3685f9b8f1aa365a0c95',
    ),
    'phar-io/manifest' => 
    array (
      'pretty_version' => '1.0.3',
      'version' => '1.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '7761fcacf03b4d4f16e7ccb606d4879ca431fcf4',
    ),
    'phar-io/version' => 
    array (
      'pretty_version' => '2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '45a2ec53a73c70ce41d55cedef9063630abaf1b6',
    ),
    'phenx/php-font-lib' => 
    array (
      'pretty_version' => '0.5.2',
      'version' => '0.5.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ca6ad461f032145fff5971b5985e5af9e7fa88d8',
    ),
    'phenx/php-svg-lib' => 
    array (
      'pretty_version' => 'v0.3.3',
      'version' => '0.3.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '5fa61b65e612ce1ae15f69b3d223cb14ecc60e32',
    ),
    'phpdocumentor/reflection-common' => 
    array (
      'pretty_version' => '2.1.0',
      'version' => '2.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '6568f4687e5b41b054365f9ae03fcb1ed5f2069b',
    ),
    'phpdocumentor/reflection-docblock' => 
    array (
      'pretty_version' => '5.1.0',
      'version' => '5.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cd72d394ca794d3466a3b2fc09d5a6c1dc86b47e',
    ),
    'phpdocumentor/type-resolver' => 
    array (
      'pretty_version' => '1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '7462d5f123dfc080dfdf26897032a6513644fc95',
    ),
    'phpoffice/phpspreadsheet' => 
    array (
      'pretty_version' => '1.12.0',
      'version' => '1.12.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f79611d6dc1f6b7e8e30b738fc371b392001dbfd',
    ),
    'phpoption/phpoption' => 
    array (
      'pretty_version' => '1.7.4',
      'version' => '1.7.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b2ada2ad5d8a32b89088b8adc31ecd2e3a13baf3',
    ),
    'phpspec/prophecy' => 
    array (
      'pretty_version' => 'v1.10.3',
      'version' => '1.10.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '451c3cd1418cf640de218914901e51b064abb093',
    ),
    'phpunit/php-code-coverage' => 
    array (
      'pretty_version' => '6.1.4',
      'version' => '6.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '807e6013b00af69b6c5d9ceb4282d0393dbb9d8d',
    ),
    'phpunit/php-file-iterator' => 
    array (
      'pretty_version' => '2.0.2',
      'version' => '2.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '050bedf145a257b1ff02746c31894800e5122946',
    ),
    'phpunit/php-text-template' => 
    array (
      'pretty_version' => '1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '31f8b717e51d9a2afca6c9f046f5d69fc27c8686',
    ),
    'phpunit/php-timer' => 
    array (
      'pretty_version' => '2.1.2',
      'version' => '2.1.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '1038454804406b0b5f5f520358e78c1c2f71501e',
    ),
    'phpunit/php-token-stream' => 
    array (
      'pretty_version' => '3.1.1',
      'version' => '3.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '995192df77f63a59e47f025390d2d1fdf8f425ff',
    ),
    'phpunit/phpunit' => 
    array (
      'pretty_version' => '7.5.20',
      'version' => '7.5.20.0',
      'aliases' => 
      array (
      ),
      'reference' => '9467db479d1b0487c99733bb1e7944d32deded2c',
    ),
    'prettus/l5-repository' => 
    array (
      'pretty_version' => '2.6.46',
      'version' => '2.6.46.0',
      'aliases' => 
      array (
      ),
      'reference' => '5d5379a838d349447f1e09dcdc0426dfde3affb1',
    ),
    'prettus/laravel-validation' => 
    array (
      'pretty_version' => '1.2.2',
      'version' => '1.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '3d43037c2f497df3f8fbf3d8c16954a83c72e530',
    ),
    'psr/container' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
    ),
    'psr/event-dispatcher-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/http-message' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f6561bf28d520154e4b0ec72be95418abe6d9363',
    ),
    'psr/http-message-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/log' => 
    array (
      'pretty_version' => '1.1.3',
      'version' => '1.1.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '0f73288fd15629204f9d42b7055f72dacbe811fc',
    ),
    'psr/log-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0.0',
        1 => '1.0',
      ),
    ),
    'psr/simple-cache' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '408d5eafb83c57f6365a3ca330ff23aa4a5fa39b',
    ),
    'psy/psysh' => 
    array (
      'pretty_version' => 'v0.9.12',
      'version' => '0.9.12.0',
      'aliases' => 
      array (
      ),
      'reference' => '90da7f37568aee36b116a030c5f99c915267edd4',
    ),
    'ralouphie/getallheaders' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '120b605dfeb996808c31b6477290a714d356e822',
    ),
    'ramsey/uuid' => 
    array (
      'pretty_version' => '3.9.3',
      'version' => '3.9.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '7e1633a6964b48589b142d60542f9ed31bd37a92',
    ),
    'rap2hpoutre/laravel-log-viewer' => 
    array (
      'pretty_version' => 'v0.15.0',
      'version' => '0.15.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '4a594fea854a2eb67e89324bcb6879d55f870e64',
    ),
    'razorpay/razorpay' => 
    array (
      'pretty_version' => '2.5.0',
      'version' => '2.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '96c0167176cf53e3da15640622e9b993a3450ec7',
    ),
    'rhumsaa/uuid' => 
    array (
      'replaced' => 
      array (
        0 => '3.9.3',
      ),
    ),
    'rmccue/requests' => 
    array (
      'pretty_version' => 'v1.7.0',
      'version' => '1.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '87932f52ffad70504d93f04f15690cf16a089546',
    ),
    'sabberworm/php-css-parser' => 
    array (
      'pretty_version' => '8.3.1',
      'version' => '8.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd217848e1396ef962fb1997cf3e2421acba7f796',
    ),
    'sebastian/code-unit-reverse-lookup' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4419fcdb5eabb9caa61a27c7a1db532a6b55dd18',
    ),
    'sebastian/comparator' => 
    array (
      'pretty_version' => '3.0.2',
      'version' => '3.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '5de4fc177adf9bce8df98d8d141a7559d7ccf6da',
    ),
    'sebastian/diff' => 
    array (
      'pretty_version' => '3.0.2',
      'version' => '3.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '720fcc7e9b5cf384ea68d9d930d480907a0c1a29',
    ),
    'sebastian/environment' => 
    array (
      'pretty_version' => '4.2.3',
      'version' => '4.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '464c90d7bdf5ad4e8a6aea15c091fec0603d4368',
    ),
    'sebastian/exporter' => 
    array (
      'pretty_version' => '3.1.2',
      'version' => '3.1.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '68609e1261d215ea5b21b7987539cbfbe156ec3e',
    ),
    'sebastian/global-state' => 
    array (
      'pretty_version' => '2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e8ba02eed7bbbb9e59e43dedd3dddeff4a56b0c4',
    ),
    'sebastian/object-enumerator' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '7cfd9e65d11ffb5af41198476395774d4c8a84c5',
    ),
    'sebastian/object-reflector' => 
    array (
      'pretty_version' => '1.1.1',
      'version' => '1.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '773f97c67f28de00d397be301821b06708fca0be',
    ),
    'sebastian/recursion-context' => 
    array (
      'pretty_version' => '3.0.0',
      'version' => '3.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '5b0cd723502bac3b006cbf3dbf7a1e3fcefe4fa8',
    ),
    'sebastian/resource-operations' => 
    array (
      'pretty_version' => '2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4d7a795d35b889bf80a0cc04e08d77cedfa917a9',
    ),
    'sebastian/version' => 
    array (
      'pretty_version' => '2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '99732be0ddb3361e16ad77b68ba41efc8e979019',
    ),
    'smartervision/laravel-generator' => 
    array (
      'pretty_version' => 'dev-master',
      'version' => 'dev-master',
      'aliases' => 
      array (
      ),
      'reference' => '9128bc63b9d7cf53cf185c39f886915da9954a79',
    ),
    'smartervision/laravel-installer' => 
    array (
      'pretty_version' => 'dev-master',
      'version' => 'dev-master',
      'aliases' => 
      array (
      ),
      'reference' => 'ed6dd215c2aebd7b8b7267324a16ee297b4b41b7',
    ),
    'spatie/image' => 
    array (
      'pretty_version' => '1.7.6',
      'version' => '1.7.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '74535b5fd67ace75840c00c408666660843e755e',
    ),
    'spatie/image-optimizer' => 
    array (
      'pretty_version' => '1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '9c1d470e34b28b715d25edb539dd6c899461527c',
    ),
    'spatie/laravel-medialibrary' => 
    array (
      'pretty_version' => '7.19.3',
      'version' => '7.19.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '7d6b634e0967f7399e1c7cd7b02c8b7da6f80c2d',
    ),
    'spatie/laravel-permission' => 
    array (
      'pretty_version' => '2.38.0',
      'version' => '2.38.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '674ad54a0ba95d8ad26990aa250b5c9d9b165e15',
    ),
    'spatie/pdf-to-image' => 
    array (
      'pretty_version' => 'v2.x-dev',
      'version' => '2.9999999.9999999.9999999-dev',
      'aliases' => 
      array (
      ),
      'reference' => '6718a89065c34dfadfbb2ca61eb1c3e6a956e503',
    ),
    'spatie/temporary-directory' => 
    array (
      'pretty_version' => '1.2.3',
      'version' => '1.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'eeb84a7a3543e90759cd852ccb468e3d3340d99d',
    ),
    'srmklive/paypal' => 
    array (
      'pretty_version' => '1.7.0',
      'version' => '1.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '09b78947e302837eb7851e6a4c204532c9ef4927',
    ),
    'stripe/stripe-php' => 
    array (
      'pretty_version' => 'v5.9.2',
      'version' => '5.9.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '026191d12241a76c957884dff75e4f3721b0e77f',
    ),
    'swiftmailer/swiftmailer' => 
    array (
      'pretty_version' => 'v6.2.3',
      'version' => '6.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '149cfdf118b169f7840bbe3ef0d4bc795d1780c9',
    ),
    'symfony/console' => 
    array (
      'pretty_version' => 'v4.4.9',
      'version' => '4.4.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '326b064d804043005526f5a0494cfb49edb59bb0',
    ),
    'symfony/css-selector' => 
    array (
      'pretty_version' => 'v5.1.0',
      'version' => '5.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e544e24472d4c97b2d11ade7caacd446727c6bf9',
    ),
    'symfony/debug' => 
    array (
      'pretty_version' => 'v4.4.9',
      'version' => '4.4.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '28f92d08bb6d1fddf8158e02c194ad43870007e6',
    ),
    'symfony/error-handler' => 
    array (
      'pretty_version' => 'v4.4.9',
      'version' => '4.4.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '0df9a23c0f9eddbb6682479fee6fd58b88add75b',
    ),
    'symfony/event-dispatcher' => 
    array (
      'pretty_version' => 'v4.4.9',
      'version' => '4.4.9.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a5370aaa7807c7a439b21386661ffccf3dff2866',
    ),
    'symfony/event-dispatcher-contracts' => 
    array (
      'pretty_version' => 'v1.1.7',
      'version' => '1.1.7.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c43ab685673fb6c8d84220c77897b1d6cdbe1d18',
    ),
    'symfony/event-dispatcher-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.1',
      ),
    ),
    'symfony/finder' => 
    array (
      'pretty_version' => 'v4.4.9',
      'version' => '4.4.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '5729f943f9854c5781984ed4907bbb817735776b',
    ),
    'symfony/http-foundation' => 
    array (
      'pretty_version' => 'v4.4.9',
      'version' => '4.4.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '3adfbd7098c850b02d107330b7b9deacf2581578',
    ),
    'symfony/http-kernel' => 
    array (
      'pretty_version' => 'v4.4.9',
      'version' => '4.4.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '54526b598d7fc86a67850488b194a88a79ab8467',
    ),
    'symfony/mime' => 
    array (
      'pretty_version' => 'v5.1.0',
      'version' => '5.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '56261f89385f9d13cf843a5101ac72131190bc91',
    ),
    'symfony/polyfill-ctype' => 
    array (
      'pretty_version' => 'v1.17.0',
      'version' => '1.17.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e94c8b1bbe2bc77507a1056cdb06451c75b427f9',
    ),
    'symfony/polyfill-iconv' => 
    array (
      'pretty_version' => 'v1.17.0',
      'version' => '1.17.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c4de7601eefbf25f9d47190abe07f79fe0a27424',
    ),
    'symfony/polyfill-intl-idn' => 
    array (
      'pretty_version' => 'v1.17.0',
      'version' => '1.17.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '3bff59ea7047e925be6b7f2059d60af31bb46d6a',
    ),
    'symfony/polyfill-mbstring' => 
    array (
      'pretty_version' => 'v1.17.0',
      'version' => '1.17.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fa79b11539418b02fc5e1897267673ba2c19419c',
    ),
    'symfony/polyfill-php72' => 
    array (
      'pretty_version' => 'v1.17.0',
      'version' => '1.17.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f048e612a3905f34931127360bdd2def19a5e582',
    ),
    'symfony/polyfill-php73' => 
    array (
      'pretty_version' => 'v1.17.0',
      'version' => '1.17.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a760d8964ff79ab9bf057613a5808284ec852ccc',
    ),
    'symfony/polyfill-php80' => 
    array (
      'pretty_version' => 'v1.17.0',
      'version' => '1.17.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '5e30b2799bc1ad68f7feb62b60a73743589438dd',
    ),
    'symfony/process' => 
    array (
      'pretty_version' => 'v4.4.9',
      'version' => '4.4.9.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c714958428a85c86ab97e3a0c96db4c4f381b7f5',
    ),
    'symfony/routing' => 
    array (
      'pretty_version' => 'v4.4.9',
      'version' => '4.4.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '0f557911dde75c2a9652b8097bd7c9f54507f646',
    ),
    'symfony/service-contracts' => 
    array (
      'pretty_version' => 'v2.1.2',
      'version' => '2.1.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '66a8f0957a3ca54e4f724e49028ab19d75a8918b',
    ),
    'symfony/translation' => 
    array (
      'pretty_version' => 'v4.4.9',
      'version' => '4.4.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '79d3ef9096a6a6047dbc69218b68c7b7f63193af',
    ),
    'symfony/translation-contracts' => 
    array (
      'pretty_version' => 'v1.1.7',
      'version' => '1.1.7.0',
      'aliases' => 
      array (
      ),
      'reference' => '364518c132c95642e530d9b2d217acbc2ccac3e6',
    ),
    'symfony/translation-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'symfony/var-dumper' => 
    array (
      'pretty_version' => 'v4.4.9',
      'version' => '4.4.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '56b3aa5eab0ac6720dcd559fd1d590ce301594ac',
    ),
    'themsaid/laravel-langman' => 
    array (
      'pretty_version' => 'v1.3.5',
      'version' => '1.3.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '27cdaa7eca53a0fe7a54c413285de6112f3166de',
    ),
    'theseer/tokenizer' => 
    array (
      'pretty_version' => '1.1.3',
      'version' => '1.1.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '11336f6f84e16a720dae9d8e6ed5019efa85a0f9',
    ),
    'tijsverkoyen/css-to-inline-styles' => 
    array (
      'pretty_version' => '2.2.2',
      'version' => '2.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dda2ee426acd6d801d5b7fd1001cde9b5f790e15',
    ),
    'vlucas/phpdotenv' => 
    array (
      'pretty_version' => 'v3.6.6',
      'version' => '3.6.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '4669484ccbc38fe7c4e0c50456778f2010566aad',
    ),
    'webmozart/assert' => 
    array (
      'pretty_version' => '1.8.0',
      'version' => '1.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ab2cb0b3b559010b75981b1bdce728da3ee90ad6',
    ),
    'yajra/laravel-datatables' => 
    array (
      'pretty_version' => 'v1.5.0',
      'version' => '1.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '50de5e20ef01da1a353e0a81c0ad5f9da6a985ec',
    ),
    'yajra/laravel-datatables-buttons' => 
    array (
      'pretty_version' => 'v4.9.1',
      'version' => '4.9.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b211e3c77ae37a462d47f6b8ae8d47cc9339658c',
    ),
    'yajra/laravel-datatables-editor' => 
    array (
      'pretty_version' => 'v1.21.0',
      'version' => '1.21.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd46f8110af82daa14463c6ad7fbec23d75b90c3a',
    ),
    'yajra/laravel-datatables-fractal' => 
    array (
      'pretty_version' => 'v1.6.0',
      'version' => '1.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '0aa387a9b3738248fa61110f0378904ef42b4a73',
    ),
    'yajra/laravel-datatables-html' => 
    array (
      'pretty_version' => 'v4.27.0',
      'version' => '4.27.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '056b6a833f7cafa33de06c41d48fb85174e43a9c',
    ),
    'yajra/laravel-datatables-oracle' => 
    array (
      'pretty_version' => 'v9.10.1',
      'version' => '9.10.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '01b4a4fdbd13e4d77fa2d27916cdafac789d2d1a',
    ),
  ),
);
private static $canGetVendors;
private static $installedByVendor = array();







public static function getInstalledPackages()
{
$packages = array();
foreach (self::getInstalled() as $installed) {
$packages[] = array_keys($installed['versions']);
}


if (1 === \count($packages)) {
return $packages[0];
}

return array_keys(array_flip(\call_user_func_array('array_merge', $packages)));
}









public static function isInstalled($packageName)
{
foreach (self::getInstalled() as $installed) {
if (isset($installed['versions'][$packageName])) {
return true;
}
}

return false;
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

$ranges = array();
if (isset($installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = $installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['version'])) {
return null;
}

return $installed['versions'][$packageName]['version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getPrettyVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return $installed['versions'][$packageName]['pretty_version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getReference($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['reference'])) {
return null;
}

return $installed['versions'][$packageName]['reference'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getRootPackage()
{
$installed = self::getInstalled();

return $installed[0]['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
self::$installedByVendor = array();
}




private static function getInstalled()
{
if (null === self::$canGetVendors) {
self::$canGetVendors = method_exists('Composer\Autoload\ClassLoader', 'getRegisteredLoaders');
}

$installed = array();

if (self::$canGetVendors) {
foreach (ClassLoader::getRegisteredLoaders() as $vendorDir => $loader) {
if (isset(self::$installedByVendor[$vendorDir])) {
$installed[] = self::$installedByVendor[$vendorDir];
} elseif (is_file($vendorDir.'/composer/installed.php')) {
$installed[] = self::$installedByVendor[$vendorDir] = require $vendorDir.'/composer/installed.php';
}
}
}

$installed[] = self::$installed;

return $installed;
}
}
