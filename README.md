# PrixElectRTE

Bonjour,

Voici le tutorial pour se connecter au api de rte

1. Aller sur https://data.rte-france.com/catalog/-/api/market/Wholesale-Market/v2.0

2. Créer un compte 

3. S'abonne au service Wholesale Market

4. Récuperer le code token base 64 dans votre compte 
https://data.rte-france.com/group/guest/apps

5. Utilise code Php au dessus avec votre token base64

Astuce : Récuperer le graph 1 fois par jour à 14h pour avoir le jour suivant



Format JSON du retour :

GET /wholesale_market/v2/france_power_exchanges

{"france_power_exchanges":[

          {
          "start_date":"2015-06-01T00:00:00+02:00",
          "end_date":"2015-07-01T00:00:00+02:00",
          "updated_date":"2015-06-01T11:03:00+02:00",
          "base_load":29.96,
          "peak_load":32.83,
          "values":
                    [
                    {"start_date":"2015-06-01T00:00:00+02:00","end_date":"2015-06-01T01:00:00+02:00","value":11596.7,"price":27.42},
                    {"start_date":"2015-06-01T01:00:00+02:00","end_date":"2015-06-01T02:00:00+02:00","value":11785.0,"price":24.55},
                    {"start_date":"2015-06-01T02:00:00+02:00","end_date":"2015-06-01T03:00:00+02:00","value":11675.6,"price":21.41},
                    { ... 24 jeux de valeurs pour 24 pas horaires ...}
                    ]
          }
]}
