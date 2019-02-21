<?php

define('DEVELOP_ALLOW_SYSTEM_START', TRUE);
require_once('system/start.php');

############################################################
#                Reste de l'index
# J'ai constaté une gestion intégrale par pre-caching
# Donc le projet ne comporte aucun fichier HTML ou format associé
#        //page handler
#        $handler = input('h');
#        //page name
#        $page = input('p');
#
#        //check if there is no handler then load index page handler
#        if (empty($handler)) {
#            $handler = 'index';
#        }
#        echo develop_load_page($handler, $page);
#
############################################################

echo $Develop->twig->render('index.html.twig');