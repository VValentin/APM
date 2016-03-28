{% extends "layouts\base_dashboard.volt" %}

{% block content %}
        <div class="container">
            <div class="jumbotron">
                <h1>Addresses</h1>
                <p>Manage your addresses</p>
                {% if addresses_available %}
                    <p><table id="addresses" class="display compact" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>City</th>
                                <th>Street</th>
                                <th>Number</th>
                                <th>Building</th>
                                <th>Entrance</th>
                                <th>Apartment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table></p>
                {% endif %}
                <p><a class="btn btn-primary btn-lg" href="{{ url('addresses/newAddress') }}" role="button">Add new address</a></p>
            </div>
        </div>
            
        <script>
            $(document).ready(function() {
                addresses = $('#addresses').DataTable({
                    "ajax": {
                        "url": '/apm/addresses/getAddresses',
                        "dataSrc": ""
                    },
                    "paging": false,
                    "ordering": false,
                    "info": false,
                    "searching": false,
                    "dom":
                        '<"fg-toolbar ui-toolbar ui-widget-header ui-helper-clearfix ui-corner-tl ui-corner-tr"lfr>'+
                        't'+
                        '<"fg-toolbar ui-toolbar ui-widget-header ui-helper-clearfix ui-corner-bl ui-corner-br"ip>',
                    "iDisplayLength": 10,
                    "columns": [
                        {
                            "data": null,
                            "render": function (data, type, row) {
                                return row['city'];
                            }
                        },
                        {
                            "data": null,
                            "render": function (data, type, row) {
                                return row['street'];
                            }
                        },
                        {
                            "data": null,
                            "render": function (data, type, row) {
                                return row['number'];
                            }
                        },
                        {
                            "data": null,
                            "render": function (data, type, row) {
                                return row['building'];
                            }
                        },
                        {
                            "data": null,
                            "render": function (data, type, row) {
                                return row['entrance'];
                            }
                        },
                        {
                            "data": null,
                            "render": function (data, type, row) {
                                return row['apartment'];
                            }
                        },
                        {
                            "data": null,
                            "render": function (data, type, row) {
                                return '<div>Test</div>';
                            }
                        },
                    ]
                });
            });
        </script>    
{% endblock %}

