<?php

define('DEVELOP_ALLOW_SYSTEM_START', TRUE);
require_once('system/start.php');

############################################################
#                Reste de l'index
# J'ai constaté une gestion intégrale par pre-caching
# Donc le projet ne comporte aucun fichier HTML ou format associé
# Il n'y a pas de templating non plus
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
