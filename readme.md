# How to Deploy on AWS deployment file on root project

# Pizza Shop Routes


<table>
    <tr>
        <td>Verb</td><td>URI</td><td>Action</td><td>Example</td>
    </tr>
    <tr>
        <td>GET</td><td>pizza-shop/public/api/v1/pizza</td><td>READ</td><td>{"pizzas": [
                                                                            {
                                                                              "id": 1,
                                                                              "name": "Quincy Okuneva DDS",
                                                                              "image": "http://lorempixel.com/640/480/?35566",
                                                                              "created_at": "2016-09-27 18:00:57",
                                                                              "updated_at": "2016-09-27 18:00:57",
                                                                              "amount": "11.25",
                                                                              "ingredients": [
                                                                                {
                                                                                  "id": 1,
                                                                                  "name": "Alena Kovacek Sr.",
                                                                                  "amount": "4.50",
                                                                                  "created_at": "2016-09-27 18:00:57",
                                                                                  "updated_at": "2016-09-27 18:00:57",
                                                                                  "pivot": {
                                                                                    "pizza_id": 1,
                                                                                    "ingredient_id": 1
                                                                                  }
                                                                                },
                                                                                {
                                                                                  "id": 3,
                                                                                  "name": "Amanda Kiehn",
                                                                                  "amount": "3.00",
                                                                                  "created_at": "2016-09-27 18:00:57",
                                                                                  "updated_at": "2016-09-27 18:00:57",
                                                                                  "pivot": {
                                                                                    "pizza_id": 1,
                                                                                    "ingredient_id": 3
                                                                                  }
                                                                                }
                                                                              ]
                                                                            }
                                                                          ]
                                                                         }</td>
    </tr>
    <tr>
            <td>POST</td><td>pizza-shop/public/api/v1/pizza</td><td>CREATE</td><td>INPUT-> {"pizza":
                                                                                                                                                       {
                                                                                                                                                           "name":"Carbonara",
                                                                                                                                                           "image":"/hola/hola",
                                                                                                                                                           "ingredients":[
                                                                                                                                                           	{
                                                                                                                                                           		"id":"3"
                                                                                                                                                           	},
                                                                                                                                                           	{
                                                                                                                                                           	    "name":"Bacon",
                                                                                                                                                           	    "amount":"2.50"
                                                                                                                                                           	}

                                                                                                                                                           ]
                                                                                                                                                       }

                                                                                                                                                   }</td>
        </tr>
</table>







PUT   pizza-shop/public/api/v1/pizza/{id}    UPDATE     INPUT -> {"pizza":
                                                                     {
                                                                         "name":"Carbonara",
                                                                         "image":"/hola/hola",
                                                                         "ingredients":[
                                                                            {
                                                                                "id":"3"
                                                                            },
                                                                            {
                                                                                "name":"Bacon",
                                                                                "amount":"2.50"
                                                                            }

                                                                         ]
                                                                     }

                                                                 }


DELETE  pizza-shop/public/api/v1/pizza/{id}   DELETE    //