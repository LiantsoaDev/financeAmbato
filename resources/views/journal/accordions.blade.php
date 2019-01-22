<div class="accordion-group">
        <div id="collapseOne1" class="accordion-body collapse">
            <div class="accordion-inner">
                    <div class="w-box" id="n_datepicker">
                            <div class="w-box-header">
                                <h4>Filtre du Journal </h4>
                            </div>
                            <form action="{{route('mouvement.journal.filtre')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="w-box-content cnt_a">
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <label>Par date de début</label>
                                            <div class="input-append date" id="intervallepicker1" data-date-format="dd-mm-yyyy" data-date="{{date('d/m/Y')}}">
                                                <input class="span6" size="16" name="debut" value="{{date('d/m/Y')}}" readonly type="text">
                                                <span class="add-on"><i class="icon-calendar"></i></span>
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <label>date de fin</label>
                                            <div class="input-append date" id="intervallepicker2" data-date-format="dd-mm-yyyy" data-date="{{ date("d/m/Y", strtotime("+1 days")) }}">
                                                <input class="span6" size="16" name="fin" value="{{ date("d/m/Y", strtotime("+1 days")) }}" readonly type="text">
                                                <span class="add-on"><i class="icon-calendar"></i></span>
                                            </div>
                                        </div>
                                        <div class="span4">
                                                <label>Validation de la filtre</label>
                                                <button class="btn btn-success">Rechercher</button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        </div>
            </div>
        </div>
    </div>