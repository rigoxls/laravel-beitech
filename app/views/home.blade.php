@extends('layouts.layout')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3>Read First</h3>
                </div>

                <div class="panel-body medium-font">
                    This is a test project, it was created to implement a transaction interface only for testing purposes.
                    You can navigate in menu above, create products and customers and do operations between them.

                    <h3>Tasks Explanation Part 1</h3>
                    <ol>
                        <li>
                            Task one, you can select in menu above the link
                            <a role="menuitem" tabindex="-1" href="/link-customer-product">Link Customer - Products</a>
                            then you can link customers with products.<br> You need first to insert data in custumers and products table.
                            <br>
                        </li>
                        <li>
                            Task two, you can go to <a role="menuitem" tabindex="-1" href="/create-product">Create Product</a>
                            and create a product, prices by default are saved in € currency.
                        </li>
                        <li>
                            Task three, you can go to <a role="menuitem" tabindex="-1" href="/create-order">Create Order</a>
                            all about this task is in that link.
                        </li>
                    </ol>

                    <h3>Tasks Explanation Part 2</h3>

                    <ol>
                        <li>
                            Task one, you can check link products and customers in here
                            <a role="menuitem" tabindex="-1" href="/link-customer-product">Link Customer - Products</a>
                        </li>
                        <li>
                            Task two, you can save currencies from  'http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml' in <a role="menuitem" tabindex="-1" href="/get-currencies">Update Currencies</a>,
                            This is not automatic , cause i need to use a cron function in the server, but you can update the database everytime you require.


                        </li>
                        <li>
                            Task three, you can go to <a role="menuitem" tabindex="-1" href="/create-order">Create Order</a>
                            and create an order for a specific customer. You can check and notice that all products are listed with
                            Unitary Price in €, total € Price and Total $ price for each product and the order.
                        </li>
                    </ol>

                    <h3>REST web service</h3>
                    <p>
                        You can get orders by date , typing this url <a role="menuitem" tabindex="-1" href="/rest-service/2015-05-02/2015-05-02">rest-service/2015-05-02/2015-05-02</a> and passing 2 parameters, first one
                        is start date, and second one end date. Data is returned in json format, if you wanna read this info you can use an online json parse like <a role="menuitem" tabindex="-1" href="https://www.jsoneditoronline.org/">https://www.jsoneditoronline.org</a>.
                    </p>
                    <br>
                    <h3>Project Configuration</h3>
                    <p>
                        Just unzip the folder an put real values for database in /app/config/database.php or you can see an online demo in <a role="menuitem" tabindex="-1" href="http://beitech.grammershouse.com">http://beitech.grammershouse.com</a>.
                    </p>

                </div>

            </div>

    </div>
</div>

@stop