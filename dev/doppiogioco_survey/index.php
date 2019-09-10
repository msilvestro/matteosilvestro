<?php
# choose randomly one of the 55,888 linear stories
$rand = mt_rand(0, 55887);

# get the story (i.e. the sequence of units) by reading the line of the csv
# file corresponding to the random number extracted
$file = new SplFileObject('linear_stories.csv');  # super fast
$file->seek($rand);
$story = str_getcsv($file->current());

# for debug
# $story = array($story[0], $story[1]);

# extract all unit texts
$texts = array();
if (($handle = fopen('unit_texts.csv', 'r')) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if (array(null) !== $data) {
            $unit = $data[0];
            $text = nl2br(htmlspecialchars($data[1]));
            $text = str_replace(array("\r", "\n"), '', $text);
            $texts[$unit] = $text;
        }
    }
    fclose($handle);
}

# message to display at the beginning of the survey
$greetings = <<<EOT
Questo sondaggio è stato creato per la mia tesi magistrale sulla valutazione delle storie interattive, per il <em>Master's Degree in Stochastics and Data Science</em> dell'Università di Torino. L'obiettivo è quello di ottenere un metodo statistico per valutare le storie interattive, che possono diventare molto complesse e difficili da gestire.
Una storia interattiva è semplicemente una storia che cambia in base alle interazioni dei lettori/giocatori, spesso in base alle scelte svolte durante il corso del racconto. Un esempio storico è il librogame (o libro-gioco).
Il tuo contributo è molto importante perché, come succede spesso in statistica, la valutazione umana aiuta gli algoritmi a comprendere meglio concetti non del tutto razionali.

In questo sondaggio ti verranno proposte delle unità di testo, che insieme formano una delle tante storie che puoi vivere con <em>DoppioGioco</em>, il sistema di narrazione interattiva che sto analizzando. Non saranno richieste decisioni da prendere né altre interazioni, il sistema propone una storia con scelte già fissate generata automaticamente per rendere più immediato il sondaggio.
Ti chiedo di leggere con attenzione la storia e, per ogni unità che la compone, scegliere quali sono i personaggi che ritieni più importanti e come ti senti dopo la lettura. Rispondi nel modo più spontaneo possibile, senza pensarci troppo.
Alla fine di tutto, ci sarà un breve questionario sulla storia nella sua interezza, in cui esprimere alcune valutazioni complessive.

Il tempo di compilazione può variare da 20 a 40 minuti, visto che le storie generate hanno lunghezza variable. I dati sono raccolti in forma anonima.
Grazie per il tempo che dedicherai a questo sondaggio!

- Matteo Silvestro
EOT;
$greetings = nl2br($greetings);
$greetings = str_replace(array("\r", "\n"), '', $greetings);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <title>Sondaggio DoppioGioco</title>
    <script src="https://unpkg.com/jquery"></script>
    <script src="https://surveyjs.azureedge.net/0.12.34/survey.jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./index.css">

    <!-- noUiSlider -->
    <script src="https://unpkg.com/nouislider@9.2.0"></script>
    <script src="https://unpkg.com/wnumb@1.1.0"></script>
    <link href="https://unpkg.com/nouislider@9.2.0/distribute/nouislider.min.css" rel="stylesheet" />
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
    <!-- Sortable -->
    <script src="http://rubaxa.github.io/Sortable/Sortable.js"></script>
</head>
<body>
    <div id="wrapper">
        <div id="surveyElement"></div>
        <div id="surveyResult"></div>
    </div>

    <script type="text/javascript">
        // use Bootstrap theme
        Survey.Survey.cssType = 'bootstrap';

        // ## add new widgets ##
        Survey.JsonObject.metaData.addProperty('checkbox', {name: 'renderAs', default: 'standard', choices: ['standard', 'valence_slider', 'arousal_slider', 'slider', 'select2', 'sortablejs']});

        // add noUiSlider - valence slider
        var valenceSliderWidget = {
            name: 'valence_slider',
            htmlTemplate: '<div id="valence-slider"></div>',
            isFit : function(question) { return question['renderAs'] === 'valence_slider'; },
            afterRender: function(question, el) {
                var slider = el.querySelector('#valence-slider');
            
                noUiSlider.create(slider, {
                    start: 0,
                    snap: true,
                    connect: [true, false],
                    range: {
                        'min': 0,
                        '25%': 1,
                        '50%': 2,
                        '75%': 3,
                        'max': 4
                    },
                    pips: {
                        mode: 'steps',
                        density: -1,
                        format: {
                        to: function (value) {
                            var label = "";
                            switch (value) {
                                case 0:
                                    label = "Negativo";
                                    break;
                                case 2:
                                    label = "Neutro";
                                    break;
                                case 4:
                                    label = "Positivo";
                                    break;
                            }
                            return label;
                        },
                        from: function (value) {
                            return value;
                        }
                    }
                    }
                });

                slider.noUiSlider.on('set', function(){
                    label = slider.noUiSlider.get();
                    value = parseInt(label);
                    question.value = value;
                });

                // to avoid a default choice, hide the handles and the colored bar until the user clicks on the slider
                slider.querySelector('.noUi-handle').style.visibility = 'hidden';
                slider.querySelector('.noUi-base').style.backgroundColor = '#fff';

                slider.noUiSlider.on('change', function(){
                    slider.querySelector('.noUi-handle').style.visibility = 'visible';
                    slider.querySelector('.noUi-base').style.backgroundColor = '#f44336';
                });
            },

            willUnmount: function(question, el) {
                var slider = el.querySelector('#valence-slider');
                slider.noUiSlider.destroy(); 
            }

        }

        // add noUiSlider - arousal slider
        var arousalSliderWidget = {
            name: 'arousal_slider',
            htmlTemplate: '<div id="arousal-slider"></div>',
            isFit : function(question) { return question['renderAs'] === 'arousal_slider'; },
            afterRender: function(question, el) {
                var slider = el.querySelector('#arousal-slider');
            
                noUiSlider.create(slider, {
                    start: 0,
                    snap: true,
                    connect: [true, false],
                    range: {
                        'min': 0,
                        '50%': 1,
                        'max': 2
                    },
                    pips: {
                        mode: 'steps',
                        density: -1,
                        format: {
                        to: function (value) {
                            var label = "";
                            switch (value) {
                                case 0:
                                    label = "Bassa";
                                    break;
                                case 1:
                                    label = "Media";
                                    break;
                                case 2:
                                    label = "Alta";
                                    break;
                            }
                            return label;
                        },
                        from: function (value) {
                            return value;
                        }
                    }
                    }
                });

                slider.noUiSlider.on('set', function(){
                    label = slider.noUiSlider.get();
                    value = parseInt(label);
                    var bgColor = '';
                    switch (value) {
                        case 0:
                            bgColor = '#fcb29e';
                            break;
                        case 1:
                            bgColor = '#fb7750';
                            break;
                        case 2:
                            bgColor = '#ed5019';
                            break;
                    }
                    slider.querySelector('.noUi-connect').style.backgroundColor = bgColor;
                    question.value = value;
                });

                // to avoid a default choice, hide the handles and the colored bar until the user clicks on the slider
                slider.querySelector('.noUi-handle').style.visibility = 'hidden';
                slider.querySelector('.noUi-connect').style.visibility = 'hidden';

                slider.noUiSlider.on('change', function(){
                    slider.querySelector('.noUi-handle').style.visibility = 'visible';
                    slider.querySelector('.noUi-connect').style.visibility = 'visible';
                });
            },

            willUnmount: function(question, el) {
                var slider = el.querySelector('#arousal-slider');
                slider.noUiSlider.destroy(); 
            }

        }

        // add noUiSlider - continuous slider
        var sliderWidget = {
            name: 'slider',
            htmlTemplate: '<div id="slider"></div>',
            isFit : function(question) { return question['renderAs'] === 'slider'; },
            afterRender: function(question, el) {
                var slider = el.querySelector('#slider');
            
                noUiSlider.create(slider, {
                    start: 0,
                    connect: [true, false],
                    range: {
                        'min': 0,
                        'max': 100
                    },
                    pips: {
                        mode: 'steps',
                        density: 10,
                        format: {
                            to: function (value) {
                                var label = "";
                                switch (value) {
                                    case 0:
                                        label = "Per nulla";
                                        break;
                                    case 100:
                                        label = "Molto";
                                        break;
                                }
                                return label;
                            },
                            from: function (value) {
                                return value;
                            }
                        }
                    }
                });

                slider.noUiSlider.on('set', function(){
                    question.value = slider.noUiSlider.get();
                });

                // to avoid a default choice, hide the handles and the colored bar until the user clicks on the slider
                slider.querySelector('.noUi-handle').style.visibility = 'hidden';
                slider.querySelector('.noUi-connect').style.visibility = 'hidden';

                slider.noUiSlider.on('change', function(){
                    slider.querySelector('.noUi-handle').style.visibility = 'visible';
                    slider.querySelector('.noUi-connect').style.visibility = 'visible';
                });
            },

            willUnmount: function(question, el) {
                var slider = el.querySelector('#slider');
                slider.noUiSlider.destroy(); 
            }

        }

        // add Select2
        var selectWidget = {
            name: 'select2',
            htmlTemplate: '<select multiple="multiple" style="width: 100%;"></select>',
            isFit : function(question) {
                return question['renderAs'] === 'select2'; 
            },
            afterRender: function(question, el) {
                var $el = $(el).find('select');

                var widget = $el.select2({
                    tags: 'true',
                    theme: 'classic'
                });
                $el.on('select2:unselect', function (e) {
                    var index = (question.value || []).indexOf(e.params.data.id);
                    if(index !== -1) {
                        var val = question.value;
                        val.splice(index, 1);
                        question.value = val;
                    }
                });
                question.choicesChangedCallback = function() {
                    $el.select2({data: question.visibleChoices.map(function(choice) { return { id: choice.value, text: choice.text }; })});
                }
                $el.on('select2:select', function (e) {
                    question.value = (question.value || []).concat(e.params.data.id);
                });
                var updateHandler = function() {
                    $el.val(question.value).trigger("change");
                };
                question.valueChangedCallback = updateHandler;
                question.choicesChangedCallback();
                updateHandler();
            },

            willUnmount: function(question, el) {
                var $select = $(el).find('select').select2();
                $select.each(function(i,item){
                    $(item).off('select2:select').select2('destroy');
                });
            }
        }

        // add Sortable
        var sortableWidget = {
            name: 'sortablejs',
            isFit: function(question) { return question['renderAs'] === 'sortablejs'; },
            htmlTemplate: `<div></div>`,
            afterRender: function(question, el) {
                var $el = $(el);
                var style = { border: '1px solid #337ab7', width: '40%', minHeight: '50px', float: 'left' }
                $el.append(`
                    <div>
                        <div class="result">
                            Sposta qui le emozioni che hai provato.
                        </div>
                        <div class="source" style="margin-left:10px;">
                        </div>
                    </div>
                `);
                var $source = $el.find('.source').css(style);
                var $result = $el.find('.result').css(style);
                question.visibleChoices.forEach(function(choice) {
                    $source.append(`<div data-value="` + choice.value +  `">
                                        <div style="background-color:#337ab7;color:#fff;margin:5px;padding:10px;cursor:move;">` + choice.text + `</div>
                                    </div>`);
                });

                Sortable.create($result[0], {
                    animation: 150,
                    group: {
                        name: 'top3',
                        pull: true,
                        put: function (to) {
                            // limit the maximum item number to 3
                            return to.el.children.length < 3;
                        }
                    },
                    onSort: function (evt) {
                        var result = [];
                        if (evt.to.children.length === 0) {
                        } else {
                            for (var i = 0; i < evt.to.children.length; i++) {
                                result.push(evt.to.children[i].dataset.value);
                            }
                        }
                        question.value = result;
                    }
                });
                Sortable.create($source[0], {
                    animation: 150,
                    group: {
                        name: 'top3',
                        pull: true,
                        put: true
                    }
                });
            }
        }

        Survey.CustomWidgetCollection.Instance.addCustomWidget(valenceSliderWidget);
        Survey.CustomWidgetCollection.Instance.addCustomWidget(arousalSliderWidget);
        Survey.CustomWidgetCollection.Instance.addCustomWidget(sliderWidget);
        Survey.CustomWidgetCollection.Instance.addCustomWidget(selectWidget);
        Survey.CustomWidgetCollection.Instance.addCustomWidget(sortableWidget);
        // ### __ ###

        window.survey = new Survey.Model({
            cookieName: "doppiogioco_survey",
            title: "Sondaggio DoppioGioco",
            showProgressBar: "top",
            showTitle: false,
            showQuestionNumbers: "onPage",
            pages: [
                {
                    title: "Benvenuto",
                    questions: [
                        {type: "html", name: "greetings", html: "<?php echo $greetings; ?>"}
                    ]
                },
                // add a survey for each unit of this story
                <?php foreach ($story as $unit): ?>
                {
                    title: "Unità <?php echo $unit; ?>",
                    questions: [
                        {type: "html", name: "unit", html: "<?php echo $texts[$unit]; ?>"},
                        {type: "checkbox", renderAs: "select2", name: "characters_<?php echo $unit; ?>", title: "Indica il personaggio o i personaggi più importanti di cui parla questa unità.", isRequired: true, "choicesByUrl": { "url": "characters.php?unit=<?php echo $unit; ?>" }},
                        {type: "checkbox", renderAs: "valence_slider", name: "valence_<?php echo $unit; ?>", title: "Valuta il tono generale della unità, se è negativo o positivo.", isRequired: true},
                        {type: "checkbox", renderAs: "arousal_slider", name: "arousal_<?php echo $unit; ?>", title: "Valuta l’intensità delle emozioni che hai provato leggendo questa unità.", isRequired: true},
                        {type: "checkbox", renderAs: "sortablejs", name: "emotion_<?php echo $unit; ?>", title: "Indica quali emozioni hai provato (scegline fino a tre e mettile in ordine per importanza). (facoltativo)",
                            colCount: 0, choices: [
                                {value: "hot_anger", text: "Collera"},
                                {value: "despair", text: "Disperazione"},
                                {value: "amusement", text: "Divertimento"},
                                {value: "joy", text: "Gioia"},
                                {value: "interest", text: "Interesse"},
                                {value: "irritation", text: "Irritazione"},
                                {value: "pride", text: "Orgoglio"},
                                {value: "panic_fear", text: "Panico"},
                                {value: "pleasure", text: "Piacere"},
                                {value: "anxiety", text: "Preoccupazione"},
                                {value: "relief", text: "Sollievo"},
                                {value: "sadness", text: "Tristezza"}
                            ]
                        }
                    ]
                },
                <?php endforeach; ?>
                {
                    title: "La storia nel suo complesso",
                    questions: [
                        {type: "checkbox", renderAs: "select2", name: "characters_overall", title: "Indica il personaggio o i personaggi più importanti della storia.", isRequired: true, "choicesByUrl": { "url": "characters.php" }},
                        {type: "panel", name: "panel", title: "Indica quanto sei d'accordo con le seguenti affermazioni.", "innerIndent": 1,
                            elements: [
                                {type: "checkbox", renderAs: "slider", name: "engagement", title: "Mi sono sentito coinvolto nella storia.", isRequired: true},
                                {type: "checkbox", renderAs: "slider", name: "coherence", title: "La storia aveva senso.", isRequired: true},
                                {type: "checkbox", renderAs: "slider", name: "rating", title: "Mi è piaciuta la storia.", isRequired: true}
                            ]
                        },
                        {type: "radiogroup", name: "read_again", title: "Leggeresti un'altra storia?",
                            isRequired: true, choices: [
                                {value: "yes", text: "Sì"},
                                {value: "no", text: "No"}
                            ]
                        },
                        {type: "comment", name: "suggestion", title: "Hai qualche commento da fare?"}
                    ]
                },
                {
                    title: "Infine, qualche informazione su di te",
                    questions: [
                        {type: "radiogroup", name: "gender", title: "Qual è il tuo sesso?",
                            isRequired: true, choices: [
                                {value: "male", text: "Maschio"},
                                {value: "female", text: "Femmina"}
                            ]},
                        {type: "radiogroup", name: "age", title: "Quanti anni hai?",
                            isRequired: true, choices: [
                                {value: "first", text: "Meno di 18"},
                                {value: "second", text: "18-24"},
                                {value: "third", text: "25-34"},
                                {value: "fourth", text: "35-44"},
                                {value: "fifth", text: "45-54"},
                                {value: "sixth", text: "Più di 55"}
                            ]}
                    ]
                }
            ]
        });
        // make sure to always go to the top of the webpage when a survey page is changed
        survey.onCurrentPageChanged.add(function() {
            $('html, body').animate({scrollTop: 0}, 'fast');
        });
        survey.onComplete.add(function(result) {
            $.ajax({
                url: "add_result.php",
                method: "post",
                data: {
                    result: JSON.stringify(result.data)
                },
                success: function(data) {
                    document.querySelector('#surveyResult').innerHTML = "I dati sono stati salvati correttamente.";
                },
                error: function() {
                    document.querySelector('#surveyResult').innerHTML = "Errore nel salvataggio dei dati. Contattare <a href='mailto:matteosilvestro@altervista.org'>matteosilvestro@altervista.org</a>.";
                }
            });
        });

        // set italian language
        survey.locale = 'it';

        // initialize the survey
        $('#surveyElement').Survey({ 
            model: survey 
        });
    </script>
</body>
</html>
