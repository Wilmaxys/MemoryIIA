/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

let $ = require( 'jquery' );
require('bootstrap');
require('datatables.net');
require('../js/fontAwesome.min.js');
require('select2');

require('select2/dist/css/select2.css');
require('bootstrap/dist/css/bootstrap.min.css');
require('../css/app.css');


$( document ).ready(function () {

    let currentCard = null;
    let currentCardId = null;
    let currentNbCard = 0;

    $(document).on('click', '.card-image', function(){
        if($(this).children('img').attr('src') == "/build/images/dos.png")
        {
            let that = $(this);
            $.ajax({
                url:'/gameCard/' + that.attr('id'),
                type: "POST",
                dataType: "json",
                async: true,
                success: function (data)
                {
                    currentNbCard++;

                    if (currentNbCard <= 2)
                    {
                        that.children('img').attr("src", "/build/images/" + data);
                        if (currentCard == null){
                            currentCard = data;
                            currentCardId = that.attr('id');
                        }
                        else if(currentCard === data){
                            $.ajax({url:'/findCard/' + that.attr('id'),type: "POST",dataType: "json",async: true,});
                            $.ajax({url:'/findCard/' + currentCardId,type: "POST",dataType: "json",async: true,});

                            $.ajax({
                                url:'/getNbCarte/' + $('.partie').attr('id'),
                                type: "POST",
                                dataType: "json",
                                async: true,
                                success: function (data)
                                {
                                    $.ajax({url:'/setNbCard/' + $('.partie').attr('id'),type: "POST",dataType: "json",async: true,
                                        data: {
                                            'nb': parseInt(data) - 1,
                                        },
                                        success: function (data)
                                        {
                                            $('.nbCarte').html(data);

                                            if (parseInt(data) == 0){
                                                $.ajax({url:'/setGameFinished/' + $('.partie').attr('id'),type: "POST",dataType: "json",async: true,});

                                                $('#FinishModal').toggleClass('dp-none');
                                            }
                                        }
                                    });
                                }
                            });

                            currentCard = null;
                            currentCardId = null;
                            currentNbCard = 0;
                        }
                        else{
                            setTimeout(function() {
                                $('#'+currentCardId).children('img').attr("src", "/build/images/dos.png");
                                $('#'+that.attr('id')).children('img').attr("src", "/build/images/dos.png");

                                currentCard = null;
                                currentCardId = null;
                                currentNbCard = 0;
                            }, 500);
                        }
                    }
                }
            });
        }
    });
})

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
