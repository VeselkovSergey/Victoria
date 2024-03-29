@extends("new-design.app")

@section("content")
    <style>
        .wrapper {
            position: relative;
            border-right: unset;
            border-radius: 50px 0 0 50px;
            height: 92px;
        }

        .wrapper .block {
            padding: 30px;
            width: 87%;
            position: absolute;
            border-radius: 50px 0 0 50px;
            left: 0;
            top: 0;
        }

        .active.wrapper {
            border: 1px solid white;
        }

        .active.wrapper .block {
            background-color: var(--main-bg-color);
        }

        .wrapper .block > div {
            border-color: white;
        }

        .active.wrapper .block > div {
            color: var(--blue-color);
            border-color: var(--blue-color);
        }

        .border-adaptive-none {
            border: 1px solid white;
        }

        @media screen and (max-width: 540px) {

            .block-adaptive-flex {
                overflow: scroll;
            }

            .active.wrapper {
                border: unset;
            }

            .wrapper .block {
                position: static;
            }

            .active.wrapper .block {
                background-color: unset;
            }

            .border-adaptive-none {
                border: unset;
            }
        }
    </style>
    <div class="mb-10">
        <div class="flex-adaptive-block">
            <div class="w-25-adaptive-100 block-adaptive-flex">
                <div class="mb-10">
                    <div class="wrapper active">
                        <div class="block">
                            <div style="border: 1px solid; border-radius: 25px; padding: 5px 25px;">
                                О компании
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-10">
                    <div class="wrapper">
                        <div class="block">
                            <div style="border: 1px solid; border-radius: 25px; padding: 5px 25px;">
                                О компании 1
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-10">
                    <div class="wrapper">
                        <div class="block">
                            <div style="border: 1px solid; border-radius: 25px; padding: 5px 25px;">
                                О компании 2
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-50-adaptive-100 border-adaptive-none" style="border-radius: 0 50px 50px 50px;">
                <div style="padding: 10px 30px;">
                    <h2 class="text-center">О компании</h2>
                    <p>
                        Древность

                        Устная передача — самый древний способ передачи знаний в истории человечества. После изобретения
                        древними цивилизациями систем записи люди начали использовать для письма почти всё, на чём можно
                        писать — глиняные таблички, кору дерева, листы металла и т. п.
                        Таблички
                        Шумерская глиняная табличка с клинописью

                        Табличку можно определить как физически прочный, надёжный носитель письменной информации,
                        относительно удобный в повседневном использовании и транспортировке. Пишущим средством в этом
                        случае, как правило, выступало стило. Можно выделить два основных типа табличек: глиняные
                        (например, у населения долины между Тигром и Евфратом), которые часто использовались для письма
                        клинописью[4], и восковые. Последние представляли собой дощечки, покрытые слоем воска, в то
                        время как глиняные полностью состояли из глины и после нанесения надписей часто обжигались для
                        придания им дополнительной прочности. После этой процедуры, соответственно, изменить текст было
                        уже невозможно; напротив, записи на восковых табличках можно было стереть и использовать
                        носитель повторно. В Древнем Риме дощечки часто скрепляли друг с другом. Известно, что
                        существовали «диптихи», «триптихи» и «полиптихи» (соответственно две, три и много дощечек)[5],
                        образуя тем самым своеобразный прототип современной книги — кодекс[6].
                        Свитки
                        Винченцо Фоппа. Юный Цицерон за книгой

                        В Древнем Египте для записи, со времён Первой Династии, использовался папирус (вид бумаги,
                        сделанной из стеблей одноимённого растения). Однако первым свидетельством считают бухгалтерские
                        книги царя Нефериркаре Какйя Пятой Династии (приблизительно 2400 лет до н.э). Отдельные листы
                        папируса, для удобства хранения, склеивались в свитки. Эта традиция получила широкое
                        распространение в Эллинском и Римском мире, хотя есть свидетельства, что использовались так же
                        древесная кора[7] и другие материалы. Технологию изготовления папируса описал в «Естественной
                        истории» (XIII. 11-13) Плиний Старший [8]. Согласно Геродоту (История 5:58), финикийцы принесли
                        письменность и папирус в Грецию около X или IX века до н. э. Греческим словом для папируса как
                        материала для записей стало «библион», а для книги — «библос»[9] которое произошло от названия
                        финикийского портового города Библос, через который папирус экспортировался в Грецию[10].

                        Чернила с поверхности папируса легко смывались и лист мог использоваться вторично для новых
                        записей. Длинная полоса (по-гречески «хартия») склеенных листов папируса (обычно около 20)
                        исписывалась с одной стороны. Папирусная полоса наматывалась на валик с ручками. При чтении надо
                        было держать одной рукой валик, а другой разматывать свиток[11].
                        Кодексы
                        Основная статья: Кодекс (книга)
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script>
        const allWrapper = document.body.querySelectorAll(".wrapper")
        allWrapper.forEach((wrapper) => {
            wrapper.addEventListener("click", (e) => {
                allWrapper.forEach((wrapper2) => {
                    wrapper2.classList.remove("active")
                })
                wrapper.classList.add("active")
            })
        })
    </script>
@endsection
