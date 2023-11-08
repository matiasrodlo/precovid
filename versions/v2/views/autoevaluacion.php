
        <div class="container">
            <div class="row mt-3 mb-3">
                <div class="col">
                    <a href="javascript:history.back()">Volver</a>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <h2>Autoevaluación oficial</h2>
                    <p>Toda la información que se recoge por la comunidad es con fines estrictamente de interés público ante la situación decretada por las Autoridades Sanitarias. Su recolección es voluntaria y con la finalidad de proteger y salvaguardar la vida de las personas.</p>
                    <p>Recuerda estas recomendaciones básicas:</p>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fas fa-house-user text-info mx-2"></i>
                            Quédate en casa
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-people-arrows text-danger mx-2"></i>
                            Evita el contacto con personas de riesgo
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-hands-wash text-success mx-2"></i>
                            Lávate las manos correctamente
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-head-side-cough text-warning mx-2"></i>
                            Si sientes síntomas, aíslate
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-user-md text-info mx-2"></i>
                            Confía en la información oficial
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <p>Con esta aplicación podrás:</p>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fas fa-stethoscope text-info mx-2"></i>
                            Evaluar tu situación de salud en función de tus síntomas
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-hospital-symbol text-info mx-2"></i>
                            Recibir instrucciones y recomendaciones en función de tu estado de salud
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-microscope text-info mx-2"></i>
                            Evaluarte cada 12 horas y mantener actualizado tu estado de salud
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-user-nurse text-info mx-2"></i>
                            Ayudar a todos los profesionales que trabajan por tu seguridad y bienestar
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <script type="text/javascript" src="<?php echo RES_JAVASCRIPTS . '/age-validation.js'; ?>"></script>
                    <form name="age-validation" id="age-validation" method="POST" action="<?php echo RUTA . '/login'; ?>">
                    <div class="alert alert-secondary text-center">
                        <p>Para utilizar esta aplicación, debes ser mayor de 16 años. Por favor, indícanos tu fecha de nacimiento:</p>
                        <div class="input-group mb-3">
                            <select class="form-control" name="dia" id="dia" required>
                                <option value="" selected disabled>Dia</option>
                                <option value="31" >31</option>
                                <option value="30" >30</option>
                                <option value="29" >29</option>
                                <option value="28" >28</option>
                                <option value="27" >27</option>
                                <option value="26" >26</option>
                                <option value="25" >25</option>
                                <option value="24" >24</option>
                                <option value="23" >23</option>
                                <option value="22" >22</option>
                                <option value="21" >21</option>
                                <option value="20" >20</option>
                                <option value="19" >19</option>
                                <option value="18" >18</option>
                                <option value="17" >17</option>
                                <option value="16" >16</option>
                                <option value="15" >15</option>
                                <option value="14" >14</option>
                                <option value="13" >13</option>
                                <option value="12" >12</option>
                                <option value="11" >11</option>
                                <option value="10" >10</option>
                                <option value="9" >9</option>
                                <option value="8" >8</option>
                                <option value="7" >7</option>
                                <option value="6" >6</option>
                                <option value="5" >5</option>
                                <option value="4" >4</option>
                                <option value="3" >3</option>
                                <option value="2" >2</option>
                                <option value="1" >1</option>
                            </select>

                            <select class="form-control" name="mes" id="mes" required>
                                <option value="" selected disabled>Mes</option>
                                <option value="12" >Diciembre</option>
                                <option value="11" >Noviembre</option>
                                <option value="10" >Octubre</option>
                                <option value="9" >Septiembre</option>
                                <option value="8" >Agosto</option>
                                <option value="7" >Julio</option>
                                <option value="6" >Junio</option>
                                <option value="5" >Mayo</option>
                                <option value="4" >Abril</option>
                                <option value="3" >Marzo</option>
                                <option value="2" >Febrero</option>
                                <option value="1" >Enero</option>
                            </select>

                            <select class="form-control" name="ano" id="ano" required>
                                <option value="" selected disabled>Año</option>
                                <option value="2004" >2004</option>
                                <option value="2003" >2003</option>
                                <option value="2002" >2002</option>
                                <option value="2001" >2001</option>
                                <option value="2000" >2000</option>

                                <option value="1999" >1999</option>
                                <option value="1998" >1998</option>
                                <option value="1997" >1997</option>
                                <option value="1996" >1996</option>
                                <option value="1995" >1995</option>
                                <option value="1994" >1994</option>
                                <option value="1993" >1993</option>
                                <option value="1992" >1992</option>
                                <option value="1991" >1991</option>
                                <option value="1990" >1990</option>

                                <option value="1989" >1989</option>
                                <option value="1988" >1988</option>
                                <option value="1987" >1987</option>
                                <option value="1986" >1986</option>
                                <option value="1985" >1985</option>
                                <option value="1984" >1984</option>
                                <option value="1983" >1983</option>
                                <option value="1982" >1982</option>
                                <option value="1981" >1981</option>
                                <option value="1980" >1980</option>

                                <option value="1979" >1979</option>
                                <option value="1978" >1978</option>
                                <option value="1977" >1977</option>
                                <option value="1976" >1976</option>
                                <option value="1975" >1975</option>
                                <option value="1974" >1974</option>
                                <option value="1973" >1973</option>
                                <option value="1972" >1972</option>
                                <option value="1971" >1971</option>
                                <option value="1970" >1970</option>

                                <option value="1969" >1969</option>
                                <option value="1968" >1968</option>
                                <option value="1967" >1967</option>
                                <option value="1966" >1966</option>
                                <option value="1965" >1965</option>
                                <option value="1964" >1964</option>
                                <option value="1963" >1963</option>
                                <option value="1962" >1962</option>
                                <option value="1961" >1961</option>
                                <option value="1960" >1960</option>

                                <option value="1959" >1959</option>
                                <option value="1958" >1958</option>
                                <option value="1957" >1957</option>
                                <option value="1956" >1956</option>
                                <option value="1955" >1955</option>
                                <option value="1954" >1954</option>
                                <option value="1953" >1953</option>
                                <option value="1952" >1952</option>
                                <option value="1951" >1951</option>
                                <option value="1950" >1950</option>

                                <option value="1949" >1949</option>
                                <option value="1948" >1948</option>
                                <option value="1947" >1947</option>
                                <option value="1946" >1946</option>
                                <option value="1945" >1945</option>
                                <option value="1944" >1944</option>
                                <option value="1943" >1943</option>
                                <option value="1942" >1942</option>
                                <option value="1941" >1941</option>
                                <option value="1940" >1940</option>

                                <option value="1939" >1939</option>
                                <option value="1938" >1938</option>
                                <option value="1937" >1937</option>
                                <option value="1936" >1936</option>
                                <option value="1935" >1935</option>
                                <option value="1934" >1934</option>
                                <option value="1933" >1933</option>
                                <option value="1932" >1932</option>
                                <option value="1931" >1931</option>
                                <option value="1930" >1930</option>

                                <option value="1929" >1929</option>
                                <option value="1928" >1928</option>
                                <option value="1927" >1927</option>
                                <option value="1926" >1926</option>
                                <option value="1925" >1925</option>
                                <option value="1924" >1924</option>
                                <option value="1923" >1923</option>
                                <option value="1922" >1922</option>
                                <option value="1921" >1921</option>
                                <option value="1920" >1920</option>

                                <option value="1919" >1919</option>
                                <option value="1918" >1918</option>
                                <option value="1917" >1917</option>
                                <option value="1916" >1916</option>
                                <option value="1915" >1915</option>
                                <option value="1914" >1914</option>
                                <option value="1913" >1913</option>
                                <option value="1912" >1912</option>
                                <option value="1911" >1911</option>
                                <option value="1910" >1910</option>
                            </select>
                        </div>
                        <button type="submit" name="siguiente" id="siguiente" class="btn btn-primary">Siguiente</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>