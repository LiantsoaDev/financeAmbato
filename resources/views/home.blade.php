@extends('layouts.app')

@section('style')
<!-- aditional stylesheets -->
        <!-- datatables -->
            <link rel="stylesheet" href="{{asset('public/js/lib/datatables/css/datatables_beoro.css')}}">
            <link rel="stylesheet" href="{{asset('public/js/lib/datatables/extras/TableTools/media/css/TableTools.css')}}">
@endsection

@section('content')

<!-- main content -->
            <div class="container">
                <div class="row-fluid">
                    <div class="span8">
                        <div class="w-box">
                            <div class="w-box-header">
                                <h4>Analytics</h4>
                                <i class="icsw16-graph icsw16-white pull-right"></i>
                            </div>
                            <div class="w-box-content cnt_a">
                                <div class="slidewrap">
                                    <ul class="slider" id="sliderName">
                                        <li class="slide">  
                                            <span class="hide headName">Pageviews</span>
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <div id="ch_pages" class="chart_a"></div>
                                                </div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span10 offset1">
                                                    <div class="row-fluid">
                                                        <div class="span4">
                                                            <div class="anlt_box">
                                                                <p class="anlt_heading">Last 24h<span class="up">+12%</span></p>
                                                                <p class="anlt_content">2 131</p>
                                                            </div>
                                                        </div>
                                                        <div class="span4">
                                                            <div class="anlt_box">
                                                                <p class="anlt_heading">Last 7 days<span class="down">-5%</span></p>
                                                                <p class="anlt_content">14 483</p>
                                                            </div>
                                                        </div>
                                                        <div class="span4">
                                                            <div class="anlt_box">
                                                                <p class="anlt_heading">Last Month<span class="up">+14%</span></p>
                                                                <p class="anlt_content">64 250</p>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="slide">
                                            <span class="hide headName">Users</span>
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <div id="ch_users" class="chart_a"></div>
                                                </div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span10 offset1">
                                                    <div class="row-fluid">
                                                        <div class="span6">
                                                            <div class="anlt_box">
                                                                <p class="anlt_heading">Last 24h<span class="up">+8%</span></p>
                                                                <p class="anlt_content">184</p>
                                                            </div>
                                                        </div>
                                                        <div class="span6">
                                                            <div class="anlt_box">
                                                                <p class="anlt_heading">Last 7 days<span class="up">+20%</span></p>
                                                                <p class="anlt_content">1468</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="slide">
                                            <span class="hide headName">Sales</span>
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <div id="ch_sales" class="chart_a"></div>
                                                </div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span10 offset1">
                                                    <div class="row-fluid">
                                                        <div class="span6">
                                                            <div class="anlt_box">
                                                                <p class="anlt_heading">Last 24h<span class="up">+20%</span></p>
                                                                <p class="anlt_content">$1 843</p>
                                                            </div>
                                                        </div>
                                                        <div class="span6">
                                                            <div class="anlt_box">
                                                                <p class="anlt_heading">Last 7 days<span class="down">-10%</span></p>
                                                                <p class="anlt_content">$11 638</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        
                        <!-- notification status -->
                        @include('notify.index')
                        <!-- end notification status -->
                        
                        <div class="w-box w-box-green hideable">
                            <div class="w-box-header">
                                <h4>Todo list</h4>
                                <div class="pull-right">
                                    <span class="label"><span class="jQ-todoAll-count"></span> tasks</span>
                                </div>
                            </div>
                            <div class="w-box-content todo-list">
                                <div class="add_box input-append">
                                    <input class="span10" type="text" placeholder="Add item" id="addTask" /><button class="btn btn-small" type="button"><i class="icon-plus"></i></button>
                                </div>
                                <h4>Personal (<span class="todo-nb"></span>)</h4>
                                <ul class="connectedSortable">
                                    <li class="high-pr"><input type="checkbox" class="todo-check" /> Buy groceries</li>
                                    <li class="low-pr completed"><input type="checkbox" checked class="todo-check" /> Do laundry</li>
                                    <li class="low-pr"><input type="checkbox" class="todo-check" /> Meeting with Macy</li>
                                    <li class="high-pr"><input type="checkbox" class="todo-check" /> Pick up kids</li>
                                </ul>
                                <h4>Work (<span class="todo-nb"></span>)</h4>
                                <ul class="connectedSortable">
                                    <li class="medium-pr"><input type="checkbox" class="todo-check" /> Send press releases</li>
                                    <li class="low-pr"><input type="checkbox" class="todo-check" /> Buy books</li>
                                    <li class="high-pr completed"><input type="checkbox" checked class="todo-check" /> Update main site</li>
                                </ul>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="w-box w-box-orange">
                            <div class="w-box-header">
                                <h4>Column Reorder & toggle visibility</h4>
                            </div>
                            <div class="w-box-content">
                                <table id="dt_colVis_Reorder" class="table table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Short name</th>
                                        <th>Long Name</th>
                                        <th>Calling Code</th>
                                        <th>ISO 2</th>
                                        <th>ISO 3</th>
                                        <th>ISO #</th>
                                        <th>ccTLD</th>
                                        <th>UN Member</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td>1</td><td>Afghanistan</td><td>Islamic Republic of Afghanistan</td><td>93</td><td>AF</td><td>AFG</td><td>004</td><td>.af</td><td>yes</td></tr>
                                    <tr><td>2</td><td>Aland Islands</td><td>Åland Islands</td><td>358</td><td>AX</td><td>ALA</td><td>248</td><td>.ax</td><td>no</td></tr>
                                    <tr><td>3</td><td>Albania</td><td>Republic of Albania</td><td>355</td><td>AL</td><td>ALB</td><td>008</td><td>.al</td><td>yes</td></tr>
                                    <tr><td>4</td><td>Algeria</td><td>People's Democratic Republic of Algeria</td><td>213</td><td>DZ</td><td>DZA</td><td>012</td><td>.dz</td><td>yes</td></tr>
                                    <tr><td>5</td><td>American Samoa</td><td>American Samoa</td><td>1+684</td><td>AS</td><td>ASM</td><td>016</td><td>.as</td><td>no</td></tr>
                                    <tr><td>6</td><td>Andorra</td><td>Principality of Andorra</td><td>376</td><td>AD</td><td>AND</td><td>020</td><td>.ad</td><td>yes</td></tr>
                                    <tr><td>7</td><td>Angola</td><td>Republic of Angola</td><td>244</td><td>AO</td><td>AGO</td><td>024</td><td>.ao</td><td>yes</td></tr>
                                    <tr><td>8</td><td>Anguilla</td><td>Anguilla</td><td>1+264</td><td>AI</td><td>AIA</td><td>660</td><td>.ai</td><td>no</td></tr>
                                    <tr><td>9</td><td>Antarctica</td><td>Antarctica</td><td>672</td><td>AQ</td><td>ATA</td><td>010</td><td>.aq</td><td>no</td></tr>
                                    <tr><td>10</td><td>Antigua and Barbuda</td><td>Antigua and Barbuda</td><td>1+268</td><td>AG</td><td>ATG</td><td>028</td><td>.ag</td><td>yes</td></tr>
                                    <tr><td>11</td><td>Argentina</td><td>Argentine Republic</td><td>54</td><td>AR</td><td>ARG</td><td>032</td><td>.ar</td><td>yes</td></tr>
                                    <tr><td>12</td><td>Armenia</td><td>Republic of Armenia</td><td>374</td><td>AM</td><td>ARM</td><td>051</td><td>.am</td><td>yes</td></tr>
                                    <tr><td>13</td><td>Aruba</td><td>Aruba</td><td>297</td><td>AW</td><td>ABW</td><td>533</td><td>.aw</td><td>no</td></tr>
                                    <tr><td>14</td><td>Australia</td><td>Commonwealth of Australia</td><td>61</td><td>AU</td><td>AUS</td><td>036</td><td>.au</td><td>yes</td></tr>
                                    <tr><td>15</td><td>Austria</td><td>Republic of Austria</td><td>43</td><td>AT</td><td>AUT</td><td>040</td><td>.at</td><td>yes</td></tr>
                                    <tr><td>16</td><td>Azerbaijan</td><td>Republic of Azerbaijan</td><td>994</td><td>AZ</td><td>AZE</td><td>031</td><td>.az</td><td>yes</td></tr>
                                    <tr><td>17</td><td>Bahamas</td><td>Commonwealth of The Bahamas</td><td>1+242</td><td>BS</td><td>BHS</td><td>044</td><td>.bs</td><td>yes</td></tr>
                                    <tr><td>18</td><td>Bahrain</td><td>Kingdom of Bahrain</td><td>973</td><td>BH</td><td>BHR</td><td>048</td><td>.bh</td><td>yes</td></tr>
                                    <tr><td>19</td><td>Bangladesh</td><td>People's Republic of Bangladesh</td><td>880</td><td>BD</td><td>BGD</td><td>050</td><td>.bd</td><td>yes</td></tr>
                                    <tr><td>20</td><td>Barbados</td><td>Barbados</td><td>1+246</td><td>BB</td><td>BRB</td><td>052</td><td>.bb</td><td>yes</td></tr>
                                    <tr><td>21</td><td>Belarus</td><td>Republic of Belarus</td><td>375</td><td>BY</td><td>BLR</td><td>112</td><td>.by</td><td>yes</td></tr>
                                    <tr><td>22</td><td>Belgium</td><td>Kingdom of Belgium</td><td>32</td><td>BE</td><td>BEL</td><td>056</td><td>.be</td><td>yes</td></tr>
                                    <tr><td>23</td><td>Belize</td><td>Belize</td><td>501</td><td>BZ</td><td>BLZ</td><td>084</td><td>.bz</td><td>yes</td></tr>
                                    <tr><td>24</td><td>Benin</td><td>Republic of Benin</td><td>229</td><td>BJ</td><td>BEN</td><td>204</td><td>.bj</td><td>yes</td></tr>
                                    <tr><td>25</td><td>Bermuda</td><td>Bermuda Islands</td><td>1+441</td><td>BM</td><td>BMU</td><td>060</td><td>.bm</td><td>no</td></tr>
                                    <tr><td>26</td><td>Bhutan</td><td>Kingdom of Bhutan</td><td>975</td><td>BT</td><td>BTN</td><td>064</td><td>.bt</td><td>yes</td></tr>
                                    <tr><td>27</td><td>Bolivia</td><td>Plurinational State of Bolivia</td><td>591</td><td>BO</td><td>BOL</td><td>068</td><td>.bo</td><td>yes</td></tr>
                                    <tr><td>28</td><td>Bonaire, Sint Eustatius and Saba</td><td>Bonaire, Sint Eustatius and Saba</td><td>599</td><td>BQ</td><td>BES</td><td>535</td><td>.bq</td><td>no</td></tr>
                                    <tr><td>29</td><td>Bosnia and Herzegovina</td><td>Bosnia and Herzegovina</td><td>387</td><td>BA</td><td>BIH</td><td>070</td><td>.ba</td><td>yes</td></tr>
                                    <tr><td>30</td><td>Botswana</td><td>Republic of Botswana</td><td>267</td><td>BW</td><td>BWA</td><td>072</td><td>.bw</td><td>yes</td></tr>
                                    <tr><td>31</td><td>Bouvet Island</td><td>Bouvet Island</td><td>NONE</td><td>BV</td><td>BVT</td><td>074</td><td>.bv</td><td>no</td></tr>
                                    <tr><td>32</td><td>Brazil</td><td>Federative Republic of Brazil</td><td>55</td><td>BR</td><td>BRA</td><td>076</td><td>.br</td><td>yes</td></tr>
                                    <tr><td>33</td><td>British Indian Ocean Territory</td><td>British Indian Ocean Territory</td><td>246</td><td>IO</td><td>IOT</td><td>086</td><td>.io</td><td>no</td></tr>
                                    <tr><td>34</td><td>Brunei</td><td>Brunei Darussalam</td><td>673</td><td>BN</td><td>BRN</td><td>096</td><td>.bn</td><td>yes</td></tr>
                                    <tr><td>35</td><td>Bulgaria</td><td>Republic of Bulgaria</td><td>359</td><td>BG</td><td>BGR</td><td>100</td><td>.bg</td><td>yes</td></tr>
                                    <tr><td>36</td><td>Burkina Faso</td><td>Burkina Faso</td><td>226</td><td>BF</td><td>BFA</td><td>854</td><td>.bf</td><td>yes</td></tr>
                                    <tr><td>37</td><td>Burundi</td><td>Republic of Burundi</td><td>257</td><td>BI</td><td>BDI</td><td>108</td><td>.bi</td><td>yes</td></tr>
                                    <tr><td>38</td><td>Cambodia</td><td>Kingdom of Cambodia</td><td>855</td><td>KH</td><td>KHM</td><td>116</td><td>.kh</td><td>yes</td></tr>
                                    <tr><td>39</td><td>Cameroon</td><td>Republic of Cameroon</td><td>237</td><td>CM</td><td>CMR</td><td>120</td><td>.cm</td><td>yes</td></tr>
                                    <tr><td>40</td><td>Canada</td><td>Canada</td><td>1</td><td>CA</td><td>CAN</td><td>124</td><td>.ca</td><td>yes</td></tr>
                                    <tr><td>41</td><td>Cape Verde</td><td>Republic of Cape Verde</td><td>238</td><td>CV</td><td>CPV</td><td>132</td><td>.cv</td><td>yes</td></tr>
                                    <tr><td>42</td><td>Cayman Islands</td><td>The Cayman Islands</td><td>1+345</td><td>KY</td><td>CYM</td><td>136</td><td>.ky</td><td>no</td></tr>
                                    <tr><td>43</td><td>Central African Republic</td><td>Central African Republic</td><td>236</td><td>CF</td><td>CAF</td><td>140</td><td>.cf</td><td>yes</td></tr>
                                    <tr><td>44</td><td>Chad</td><td>Republic of Chad</td><td>235</td><td>TD</td><td>TCD</td><td>148</td><td>.td</td><td>yes</td></tr>
                                    <tr><td>45</td><td>Chile</td><td>Republic of Chile</td><td>56</td><td>CL</td><td>CHL</td><td>152</td><td>.cl</td><td>yes</td></tr>
                                    <tr><td>46</td><td>China</td><td>People's Republic of China</td><td>86</td><td>CN</td><td>CHN</td><td>156</td><td>.cn</td><td>yes</td></tr>
                                    <tr><td>47</td><td>Christmas Island</td><td>Christmas Island</td><td>61</td><td>CX</td><td>CXR</td><td>162</td><td>.cx</td><td>no</td></tr>
                                    <tr><td>48</td><td>Cocos (Keeling) Islands</td><td>Cocos (Keeling) Islands</td><td>61</td><td>CC</td><td>CCK</td><td>166</td><td>.cc</td><td>no</td></tr>
                                    <tr><td>49</td><td>Colombia</td><td>Republic of Colombia</td><td>57</td><td>CO</td><td>COL</td><td>170</td><td>.co</td><td>yes</td></tr>
                                    <tr><td>50</td><td>Comoros</td><td>Union of the Comoros</td><td>269</td><td>KM</td><td>COM</td><td>174</td><td>.km</td><td>yes</td></tr>
                                    <tr><td>51</td><td>Congo</td><td>Republic of the Congo</td><td>242</td><td>CG</td><td>COG</td><td>178</td><td>.cg</td><td>yes</td></tr>
                                    <tr><td>52</td><td>Cook Islands</td><td>Cook Islands</td><td>682</td><td>CK</td><td>COK</td><td>184</td><td>.ck</td><td>some</td></tr>
                                    <tr><td>53</td><td>Costa Rica</td><td>Republic of Costa Rica</td><td>506</td><td>CR</td><td>CRI</td><td>188</td><td>.cr</td><td>yes</td></tr>
                                    <tr><td>54</td><td>Cote d'ivoire (Ivory Coast)</td><td>Republic of Côte D'Ivoire (Ivory Coast)</td><td>225</td><td>CI</td><td>CIV</td><td>384</td><td>.ci</td><td>yes</td></tr>
                                    <tr><td>55</td><td>Croatia</td><td>Republic of Croatia</td><td>385</td><td>HR</td><td>HRV</td><td>191</td><td>.hr</td><td>yes</td></tr>
                                    <tr><td>56</td><td>Cuba</td><td>Republic of Cuba</td><td>53</td><td>CU</td><td>CUB</td><td>192</td><td>.cu</td><td>yes</td></tr>
                                    <tr><td>57</td><td>Curacao</td><td>Curaçao</td><td>599</td><td>CW</td><td>CUW</td><td>531</td><td>.cw</td><td>no</td></tr>
                                    <tr><td>58</td><td>Cyprus</td><td>Republic of Cyprus</td><td>357</td><td>CY</td><td>CYP</td><td>196</td><td>.cy</td><td>yes</td></tr>
                                    <tr><td>59</td><td>Czech Republic</td><td>Czech Republic</td><td>420</td><td>CZ</td><td>CZE</td><td>203</td><td>.cz</td><td>yes</td></tr>
                                    <tr><td>60</td><td>Democratic Republic of the Congo</td><td>Democratic Republic of the Congo</td><td>243</td><td>CD</td><td>COD</td><td>180</td><td>.cd</td><td>yes</td></tr>
                                    <tr><td>61</td><td>Denmark</td><td>Kingdom of Denmark</td><td>45</td><td>DK</td><td>DNK</td><td>208</td><td>.dk</td><td>yes</td></tr>
                                    <tr><td>62</td><td>Djibouti</td><td>Republic of Djibouti</td><td>253</td><td>DJ</td><td>DJI</td><td>262</td><td>.dj</td><td>yes</td></tr>
                                    <tr><td>63</td><td>Dominica</td><td>Commonwealth of Dominica</td><td>1+767</td><td>DM</td><td>DMA</td><td>212</td><td>.dm</td><td>yes</td></tr>
                                    <tr><td>64</td><td>Dominican Republic</td><td>Dominican Republic</td><td>1+809, 8</td><td>DO</td><td>DOM</td><td>214</td><td>.do</td><td>yes</td></tr>
                                    <tr><td>65</td><td>Ecuador</td><td>Republic of Ecuador</td><td>593</td><td>EC</td><td>ECU</td><td>218</td><td>.ec</td><td>yes</td></tr>
                                    <tr><td>66</td><td>Egypt</td><td>Arab Republic of Egypt</td><td>20</td><td>EG</td><td>EGY</td><td>818</td><td>.eg</td><td>yes</td></tr>
                                    <tr><td>67</td><td>El Salvador</td><td>Republic of El Salvador</td><td>503</td><td>SV</td><td>SLV</td><td>222</td><td>.sv</td><td>yes</td></tr>
                                    <tr><td>68</td><td>Equatorial Guinea</td><td>Republic of Equatorial Guinea</td><td>240</td><td>GQ</td><td>GNQ</td><td>226</td><td>.gq</td><td>yes</td></tr>
                                    <tr><td>69</td><td>Eritrea</td><td>State of Eritrea</td><td>291</td><td>ER</td><td>ERI</td><td>232</td><td>.er</td><td>yes</td></tr>
                                    <tr><td>70</td><td>Estonia</td><td>Republic of Estonia</td><td>372</td><td>EE</td><td>EST</td><td>233</td><td>.ee</td><td>yes</td></tr>
                                    <tr><td>71</td><td>Ethiopia</td><td>Federal Democratic Republic of Ethiopia</td><td>251</td><td>ET</td><td>ETH</td><td>231</td><td>.et</td><td>yes</td></tr>
                                    <tr><td>72</td><td>Falkland Islands (Malvinas)</td><td>The Falkland Islands (Malvinas)</td><td>500</td><td>FK</td><td>FLK</td><td>238</td><td>.fk</td><td>no</td></tr>
                                    <tr><td>73</td><td>Faroe Islands</td><td>The Faroe Islands</td><td>298</td><td>FO</td><td>FRO</td><td>234</td><td>.fo</td><td>no</td></tr>
                                    <tr><td>74</td><td>Fiji</td><td>Republic of Fiji</td><td>679</td><td>FJ</td><td>FJI</td><td>242</td><td>.fj</td><td>yes</td></tr>
                                    <tr><td>75</td><td>Finland</td><td>Republic of Finland</td><td>358</td><td>FI</td><td>FIN</td><td>246</td><td>.fi</td><td>yes</td></tr>
                                    <tr><td>76</td><td>France</td><td>French Republic</td><td>33</td><td>FR</td><td>FRA</td><td>250</td><td>.fr</td><td>yes</td></tr>
                                    <tr><td>77</td><td>French Guiana</td><td>French Guiana</td><td>594</td><td>GF</td><td>GUF</td><td>254</td><td>.gf</td><td>no</td></tr>
                                    <tr><td>78</td><td>French Polynesia</td><td>French Polynesia</td><td>689</td><td>PF</td><td>PYF</td><td>258</td><td>.pf</td><td>no</td></tr>
                                    <tr><td>79</td><td>French Southern Territories</td><td>French Southern Territories</td><td></td><td>TF</td><td>ATF</td><td>260</td><td>.tf</td><td>no</td></tr>
                                    <tr><td>80</td><td>Gabon</td><td>Gabonese Republic</td><td>241</td><td>GA</td><td>GAB</td><td>266</td><td>.ga</td><td>yes</td></tr>
                                    <tr><td>81</td><td>Gambia</td><td>Republic of The Gambia</td><td>220</td><td>GM</td><td>GMB</td><td>270</td><td>.gm</td><td>yes</td></tr>
                                    <tr><td>82</td><td>Georgia</td><td>Georgia</td><td>995</td><td>GE</td><td>GEO</td><td>268</td><td>.ge</td><td>yes</td></tr>
                                    <tr><td>83</td><td>Germany</td><td>Federal Republic of Germany</td><td>49</td><td>DE</td><td>DEU</td><td>276</td><td>.de</td><td>yes</td></tr>
                                    <tr><td>84</td><td>Ghana</td><td>Republic of Ghana</td><td>233</td><td>GH</td><td>GHA</td><td>288</td><td>.gh</td><td>yes</td></tr>
                                    <tr><td>85</td><td>Gibraltar</td><td>Gibraltar</td><td>350</td><td>GI</td><td>GIB</td><td>292</td><td>.gi</td><td>no</td></tr>
                                    <tr><td>86</td><td>Greece</td><td>Hellenic Republic</td><td>30</td><td>GR</td><td>GRC</td><td>300</td><td>.gr</td><td>yes</td></tr>
                                    <tr><td>87</td><td>Greenland</td><td>Greenland</td><td>299</td><td>GL</td><td>GRL</td><td>304</td><td>.gl</td><td>no</td></tr>
                                    <tr><td>88</td><td>Grenada</td><td>Grenada</td><td>1+473</td><td>GD</td><td>GRD</td><td>308</td><td>.gd</td><td>yes</td></tr>
                                    <tr><td>89</td><td>Guadaloupe</td><td>Guadeloupe</td><td>590</td><td>GP</td><td>GLP</td><td>312</td><td>.gp</td><td>no</td></tr>
                                    <tr><td>90</td><td>Guam</td><td>Guam</td><td>1+671</td><td>GU</td><td>GUM</td><td>316</td><td>.gu</td><td>no</td></tr>
                                    <tr><td>91</td><td>Guatemala</td><td>Republic of Guatemala</td><td>502</td><td>GT</td><td>GTM</td><td>320</td><td>.gt</td><td>yes</td></tr>
                                    <tr><td>92</td><td>Guernsey</td><td>Guernsey</td><td>44</td><td>GG</td><td>GGY</td><td>831</td><td>.gg</td><td>no</td></tr>
                                    <tr><td>93</td><td>Guinea</td><td>Republic of Guinea</td><td>224</td><td>GN</td><td>GIN</td><td>324</td><td>.gn</td><td>yes</td></tr>
                                    <tr><td>94</td><td>Guinea-Bissau</td><td>Republic of Guinea-Bissau</td><td>245</td><td>GW</td><td>GNB</td><td>624</td><td>.gw</td><td>yes</td></tr>
                                    <tr><td>95</td><td>Guyana</td><td>Co-operative Republic of Guyana</td><td>592</td><td>GY</td><td>GUY</td><td>328</td><td>.gy</td><td>yes</td></tr>
                                    <tr><td>96</td><td>Haiti</td><td>Republic of Haiti</td><td>509</td><td>HT</td><td>HTI</td><td>332</td><td>.ht</td><td>yes</td></tr>
                                    <tr><td>97</td><td>Heard Island and McDonald Islands</td><td>Heard Island and McDonald Islands</td><td>NONE</td><td>HM</td><td>HMD</td><td>334</td><td>.hm</td><td>no</td></tr>
                                    <tr><td>98</td><td>Honduras</td><td>Republic of Honduras</td><td>504</td><td>HN</td><td>HND</td><td>340</td><td>.hn</td><td>yes</td></tr>
                                    <tr><td>99</td><td>Hong Kong</td><td>Hong Kong</td><td>852</td><td>HK</td><td>HKG</td><td>344</td><td>.hk</td><td>no</td></tr>
                                    <tr><td>100</td><td>Hungary</td><td>Hungary</td><td>36</td><td>HU</td><td>HUN</td><td>348</td><td>.hu</td><td>yes</td></tr>
                                    <tr><td>101</td><td>Iceland</td><td>Republic of Iceland</td><td>354</td><td>IS</td><td>ISL</td><td>352</td><td>.is</td><td>yes</td></tr>
                                    <tr><td>102</td><td>India</td><td>Republic of India</td><td>91</td><td>IN</td><td>IND</td><td>356</td><td>.in</td><td>yes</td></tr>
                                    <tr><td>103</td><td>Indonesia</td><td>Republic of Indonesia</td><td>62</td><td>ID</td><td>IDN</td><td>360</td><td>.id</td><td>yes</td></tr>
                                    <tr><td>104</td><td>Iran</td><td>Islamic Republic of Iran</td><td>98</td><td>IR</td><td>IRN</td><td>364</td><td>.ir</td><td>yes</td></tr>
                                    <tr><td>105</td><td>Iraq</td><td>Republic of Iraq</td><td>964</td><td>IQ</td><td>IRQ</td><td>368</td><td>.iq</td><td>yes</td></tr>
                                    <tr><td>106</td><td>Ireland</td><td>Ireland</td><td>353</td><td>IE</td><td>IRL</td><td>372</td><td>.ie</td><td>yes</td></tr>
                                    <tr><td>107</td><td>Isle of Man</td><td>Isle of Man</td><td>44</td><td>IM</td><td>IMN</td><td>833</td><td>.im</td><td>no</td></tr>
                                    <tr><td>108</td><td>Israel</td><td>State of Israel</td><td>972</td><td>IL</td><td>ISR</td><td>376</td><td>.il</td><td>yes</td></tr>
                                    <tr><td>109</td><td>Italy</td><td>Italian Republic</td><td>39</td><td>IT</td><td>ITA</td><td>380</td><td>.jm</td><td>yes</td></tr>
                                    <tr><td>110</td><td>Jamaica</td><td>Jamaica</td><td>1+876</td><td>JM</td><td>JAM</td><td>388</td><td>.jm</td><td>yes</td></tr>
                                    <tr><td>111</td><td>Japan</td><td>Japan</td><td>81</td><td>JP</td><td>JPN</td><td>392</td><td>.jp</td><td>yes</td></tr>
                                    <tr><td>112</td><td>Jersey</td><td>The Bailiwick of Jersey</td><td>44</td><td>JE</td><td>JEY</td><td>832</td><td>.je</td><td>no</td></tr>
                                    <tr><td>113</td><td>Jordan</td><td>Hashemite Kingdom of Jordan</td><td>962</td><td>JO</td><td>JOR</td><td>400</td><td>.jo</td><td>yes</td></tr>
                                    <tr><td>114</td><td>Kazakhstan</td><td>Republic of Kazakhstan</td><td>7</td><td>KZ</td><td>KAZ</td><td>398</td><td>.kz</td><td>yes</td></tr>
                                    <tr><td>115</td><td>Kenya</td><td>Republic of Kenya</td><td>254</td><td>KE</td><td>KEN</td><td>404</td><td>.ke</td><td>yes</td></tr>
                                    <tr><td>116</td><td>Kiribati</td><td>Republic of Kiribati</td><td>686</td><td>KI</td><td>KIR</td><td>296</td><td>.ki</td><td>yes</td></tr>
                                    <tr><td>117</td><td>Kosovo</td><td>Republic of Kosovo</td><td>381</td><td>XK</td><td>---</td><td>---</td><td></td><td>some</td></tr>
                                    <tr><td>118</td><td>Kuwait</td><td>State of Kuwait</td><td>965</td><td>KW</td><td>KWT</td><td>414</td><td>.kw</td><td>yes</td></tr>
                                    <tr><td>119</td><td>Kyrgyzstan</td><td>Kyrgyz Republic</td><td>996</td><td>KG</td><td>KGZ</td><td>417</td><td>.kg</td><td>yes</td></tr>
                                    <tr><td>120</td><td>Laos</td><td>Lao People's Democratic Republic</td><td>856</td><td>LA</td><td>LAO</td><td>418</td><td>.la</td><td>yes</td></tr>
                                    <tr><td>121</td><td>Latvia</td><td>Republic of Latvia</td><td>371</td><td>LV</td><td>LVA</td><td>428</td><td>.lv</td><td>yes</td></tr>
                                    <tr><td>122</td><td>Lebanon</td><td>Republic of Lebanon</td><td>961</td><td>LB</td><td>LBN</td><td>422</td><td>.lb</td><td>yes</td></tr>
                                    <tr><td>123</td><td>Lesotho</td><td>Kingdom of Lesotho</td><td>266</td><td>LS</td><td>LSO</td><td>426</td><td>.ls</td><td>yes</td></tr>
                                    <tr><td>124</td><td>Liberia</td><td>Republic of Liberia</td><td>231</td><td>LR</td><td>LBR</td><td>430</td><td>.lr</td><td>yes</td></tr>
                                    <tr><td>125</td><td>Libya</td><td>Libya</td><td>218</td><td>LY</td><td>LBY</td><td>434</td><td>.ly</td><td>yes</td></tr>
                                    <tr><td>126</td><td>Liechtenstein</td><td>Principality of Liechtenstein</td><td>423</td><td>LI</td><td>LIE</td><td>438</td><td>.li</td><td>yes</td></tr>
                                    <tr><td>127</td><td>Lithuania</td><td>Republic of Lithuania</td><td>370</td><td>LT</td><td>LTU</td><td>440</td><td>.lt</td><td>yes</td></tr>
                                    <tr><td>128</td><td>Luxembourg</td><td>Grand Duchy of Luxembourg</td><td>352</td><td>LU</td><td>LUX</td><td>442</td><td>.lu</td><td>yes</td></tr>
                                    <tr><td>129</td><td>Macao</td><td>The Macao Special Administrative Region</td><td>853</td><td>MO</td><td>MAC</td><td>446</td><td>.mo</td><td>no</td></tr>
                                    <tr><td>130</td><td>Macedonia</td><td>The Former Yugoslav Republic of Macedonia</td><td>389</td><td>MK</td><td>MKD</td><td>807</td><td>.mk</td><td>yes</td></tr>
                                    <tr><td>131</td><td>Madagascar</td><td>Republic of Madagascar</td><td>261</td><td>MG</td><td>MDG</td><td>450</td><td>.mg</td><td>yes</td></tr>
                                    <tr><td>132</td><td>Malawi</td><td>Republic of Malawi</td><td>265</td><td>MW</td><td>MWI</td><td>454</td><td>.mw</td><td>yes</td></tr>
                                    <tr><td>133</td><td>Malaysia</td><td>Malaysia</td><td>60</td><td>MY</td><td>MYS</td><td>458</td><td>.my</td><td>yes</td></tr>
                                    <tr><td>134</td><td>Maldives</td><td>Republic of Maldives</td><td>960</td><td>MV</td><td>MDV</td><td>462</td><td>.mv</td><td>yes</td></tr>
                                    <tr><td>135</td><td>Mali</td><td>Republic of Mali</td><td>223</td><td>ML</td><td>MLI</td><td>466</td><td>.ml</td><td>yes</td></tr>
                                    <tr><td>136</td><td>Malta</td><td>Republic of Malta</td><td>356</td><td>MT</td><td>MLT</td><td>470</td><td>.mt</td><td>yes</td></tr>
                                    <tr><td>137</td><td>Marshall Islands</td><td>Republic of the Marshall Islands</td><td>692</td><td>MH</td><td>MHL</td><td>584</td><td>.mh</td><td>yes</td></tr>
                                    <tr><td>138</td><td>Martinique</td><td>Martinique</td><td>596</td><td>MQ</td><td>MTQ</td><td>474</td><td>.mq</td><td>no</td></tr>
                                    <tr><td>139</td><td>Mauritania</td><td>Islamic Republic of Mauritania</td><td>222</td><td>MR</td><td>MRT</td><td>478</td><td>.mr</td><td>yes</td></tr>
                                    <tr><td>140</td><td>Mauritius</td><td>Republic of Mauritius</td><td>230</td><td>MU</td><td>MUS</td><td>480</td><td>.mu</td><td>yes</td></tr>
                                    <tr><td>141</td><td>Mayotte</td><td>Mayotte</td><td>262</td><td>YT</td><td>MYT</td><td>175</td><td>.yt</td><td>no</td></tr>
                                    <tr><td>142</td><td>Mexico</td><td>United Mexican States</td><td>52</td><td>MX</td><td>MEX</td><td>484</td><td>.mx</td><td>yes</td></tr>
                                    <tr><td>143</td><td>Micronesia</td><td>Federated States of Micronesia</td><td>691</td><td>FM</td><td>FSM</td><td>583</td><td>.fm</td><td>yes</td></tr>
                                    <tr><td>144</td><td>Moldava</td><td>Republic of Moldova</td><td>373</td><td>MD</td><td>MDA</td><td>498</td><td>.md</td><td>yes</td></tr>
                                    <tr><td>145</td><td>Monaco</td><td>Principality of Monaco</td><td>377</td><td>MC</td><td>MCO</td><td>492</td><td>.mc</td><td>yes</td></tr>
                                    <tr><td>146</td><td>Mongolia</td><td>Mongolia</td><td>976</td><td>MN</td><td>MNG</td><td>496</td><td>.mn</td><td>yes</td></tr>
                                    <tr><td>147</td><td>Montenegro</td><td>Montenegro</td><td>382</td><td>ME</td><td>MNE</td><td>499</td><td>.me</td><td>yes</td></tr>
                                    <tr><td>148</td><td>Montserrat</td><td>Montserrat</td><td>1+664</td><td>MS</td><td>MSR</td><td>500</td><td>.ms</td><td>no</td></tr>
                                    <tr><td>149</td><td>Morocco</td><td>Kingdom of Morocco</td><td>212</td><td>MA</td><td>MAR</td><td>504</td><td>.ma</td><td>yes</td></tr>
                                    <tr><td>150</td><td>Mozambique</td><td>Republic of Mozambique</td><td>258</td><td>MZ</td><td>MOZ</td><td>508</td><td>.mz</td><td>yes</td></tr>
                                    <tr><td>151</td><td>Myanmar (Burma)</td><td>Republic of the Union of Myanmar</td><td>95</td><td>MM</td><td>MMR</td><td>104</td><td>.mm</td><td>yes</td></tr>
                                    <tr><td>152</td><td>Namibia</td><td>Republic of Namibia</td><td>264</td><td>NA</td><td>NAM</td><td>516</td><td>.na</td><td>yes</td></tr>
                                    <tr><td>153</td><td>Nauru</td><td>Republic of Nauru</td><td>674</td><td>NR</td><td>NRU</td><td>520</td><td>.nr</td><td>yes</td></tr>
                                    <tr><td>154</td><td>Nepal</td><td>Federal Democratic Republic of Nepal</td><td>977</td><td>NP</td><td>NPL</td><td>524</td><td>.np</td><td>yes</td></tr>
                                    <tr><td>155</td><td>Netherlands</td><td>Kingdom of the Netherlands</td><td>31</td><td>NL</td><td>NLD</td><td>528</td><td>.nl</td><td>yes</td></tr>
                                    <tr><td>156</td><td>New Caledonia</td><td>New Caledonia</td><td>687</td><td>NC</td><td>NCL</td><td>540</td><td>.nc</td><td>no</td></tr>
                                    <tr><td>157</td><td>New Zealand</td><td>New Zealand</td><td>64</td><td>NZ</td><td>NZL</td><td>554</td><td>.nz</td><td>yes</td></tr>
                                    <tr><td>158</td><td>Nicaragua</td><td>Republic of Nicaragua</td><td>505</td><td>NI</td><td>NIC</td><td>558</td><td>.ni</td><td>yes</td></tr>
                                    <tr><td>159</td><td>Niger</td><td>Republic of Niger</td><td>227</td><td>NE</td><td>NER</td><td>562</td><td>.ne</td><td>yes</td></tr>
                                    <tr><td>160</td><td>Nigeria</td><td>Federal Republic of Nigeria</td><td>234</td><td>NG</td><td>NGA</td><td>566</td><td>.ng</td><td>yes</td></tr>
                                    <tr><td>161</td><td>Niue</td><td>Niue</td><td>683</td><td>NU</td><td>NIU</td><td>570</td><td>.nu</td><td>some</td></tr>
                                    <tr><td>162</td><td>Norfolk Island</td><td>Norfolk Island</td><td>672</td><td>NF</td><td>NFK</td><td>574</td><td>.nf</td><td>no</td></tr>
                                    <tr><td>163</td><td>North Korea</td><td>Democratic People's Republic of Korea</td><td>850</td><td>KP</td><td>PRK</td><td>408</td><td>.kp</td><td>yes</td></tr>
                                    <tr><td>164</td><td>Northern Mariana Islands</td><td>Northern Mariana Islands</td><td>1+670</td><td>MP</td><td>MNP</td><td>580</td><td>.mp</td><td>no</td></tr>
                                    <tr><td>165</td><td>Norway</td><td>Kingdom of Norway</td><td>47</td><td>NO</td><td>NOR</td><td>578</td><td>.no</td><td>yes</td></tr>
                                    <tr><td>166</td><td>Oman</td><td>Sultanate of Oman</td><td>968</td><td>OM</td><td>OMN</td><td>512</td><td>.om</td><td>yes</td></tr>
                                    <tr><td>167</td><td>Pakistan</td><td>Islamic Republic of Pakistan</td><td>92</td><td>PK</td><td>PAK</td><td>586</td><td>.pk</td><td>yes</td></tr>
                                    <tr><td>168</td><td>Palau</td><td>Republic of Palau</td><td>680</td><td>PW</td><td>PLW</td><td>585</td><td>.pw</td><td>yes</td></tr>
                                    <tr><td>169</td><td>Palestine</td><td>State of Palestine (or Occupied Palestinian Territory)</td><td>970</td><td>PS</td><td>PSE</td><td>275</td><td>.ps</td><td>some</td></tr>
                                    <tr><td>170</td><td>Panama</td><td>Republic of Panama</td><td>507</td><td>PA</td><td>PAN</td><td>591</td><td>.pa</td><td>yes</td></tr>
                                    <tr><td>171</td><td>Papua New Guinea</td><td>Independent State of Papua New Guinea</td><td>675</td><td>PG</td><td>PNG</td><td>598</td><td>.pg</td><td>yes</td></tr>
                                    <tr><td>172</td><td>Paraguay</td><td>Republic of Paraguay</td><td>595</td><td>PY</td><td>PRY</td><td>600</td><td>.py</td><td>yes</td></tr>
                                    <tr><td>173</td><td>Peru</td><td>Republic of Peru</td><td>51</td><td>PE</td><td>PER</td><td>604</td><td>.pe</td><td>yes</td></tr>
                                    <tr><td>174</td><td>Phillipines</td><td>Republic of the Philippines</td><td>63</td><td>PH</td><td>PHL</td><td>608</td><td>.ph</td><td>yes</td></tr>
                                    <tr><td>175</td><td>Pitcairn</td><td>Pitcairn</td><td>NONE</td><td>PN</td><td>PCN</td><td>612</td><td>.pn</td><td>no</td></tr>
                                    <tr><td>176</td><td>Poland</td><td>Republic of Poland</td><td>48</td><td>PL</td><td>POL</td><td>616</td><td>.pl</td><td>yes</td></tr>
                                    <tr><td>177</td><td>Portugal</td><td>Portuguese Republic</td><td>351</td><td>PT</td><td>PRT</td><td>620</td><td>.pt</td><td>yes</td></tr>
                                    <tr><td>178</td><td>Puerto Rico</td><td>Commonwealth of Puerto Rico</td><td>1+939</td><td>PR</td><td>PRI</td><td>630</td><td>.pr</td><td>no</td></tr>
                                    <tr><td>179</td><td>Qatar</td><td>State of Qatar</td><td>974</td><td>QA</td><td>QAT</td><td>634</td><td>.qa</td><td>yes</td></tr>
                                    <tr><td>180</td><td>Reunion</td><td>Réunion</td><td>262</td><td>RE</td><td>REU</td><td>638</td><td>.re</td><td>no</td></tr>
                                    <tr><td>181</td><td>Romania</td><td>Romania</td><td>40</td><td>RO</td><td>ROU</td><td>642</td><td>.ro</td><td>yes</td></tr>
                                    <tr><td>182</td><td>Russia</td><td>Russian Federation</td><td>7</td><td>RU</td><td>RUS</td><td>643</td><td>.ru</td><td>yes</td></tr>
                                    <tr><td>183</td><td>Rwanda</td><td>Republic of Rwanda</td><td>250</td><td>RW</td><td>RWA</td><td>646</td><td>.rw</td><td>yes</td></tr>
                                    <tr><td>184</td><td>Saint Barthelemy</td><td>Saint Barthélemy</td><td>590</td><td>BL</td><td>BLM</td><td>652</td><td>.bl</td><td>no</td></tr>
                                    <tr><td>185</td><td>Saint Helena</td><td>Saint Helena, Ascension and Tristan da Cunha</td><td>290</td><td>SH</td><td>SHN</td><td>654</td><td>.sh</td><td>no</td></tr>
                                    <tr><td>186</td><td>Saint Kitts and Nevis</td><td>Federation of Saint Christopher and Nevis</td><td>1+869</td><td>KN</td><td>KNA</td><td>659</td><td>.kn</td><td>yes</td></tr>
                                    <tr><td>187</td><td>Saint Lucia</td><td>Saint Lucia</td><td>1+758</td><td>LC</td><td>LCA</td><td>662</td><td>.lc</td><td>yes</td></tr>
                                    <tr><td>188</td><td>Saint Martin</td><td>Saint Martin</td><td>590</td><td>MF</td><td>MAF</td><td>663</td><td>.mf</td><td>no</td></tr>
                                    <tr><td>189</td><td>Saint Pierre and Miquelon</td><td>Saint Pierre and Miquelon</td><td>508</td><td>PM</td><td>SPM</td><td>666</td><td>.pm</td><td>no</td></tr>
                                    <tr><td>190</td><td>Saint Vincent and the Grenadines</td><td>Saint Vincent and the Grenadines</td><td>1+784</td><td>VC</td><td>VCT</td><td>670</td><td>.vc</td><td>yes</td></tr>
                                    <tr><td>191</td><td>Samoa</td><td>Independent State of Samoa</td><td>685</td><td>WS</td><td>WSM</td><td>882</td><td>.ws</td><td>yes</td></tr>
                                    <tr><td>192</td><td>San Marino</td><td>Republic of San Marino</td><td>378</td><td>SM</td><td>SMR</td><td>674</td><td>.sm</td><td>yes</td></tr>
                                    <tr><td>193</td><td>Sao Tome and Principe</td><td>Democratic Republic of São Tomé and Príncipe</td><td>239</td><td>ST</td><td>STP</td><td>678</td><td>.st</td><td>yes</td></tr>
                                    <tr><td>194</td><td>Saudi Arabia</td><td>Kingdom of Saudi Arabia</td><td>966</td><td>SA</td><td>SAU</td><td>682</td><td>.sa</td><td>yes</td></tr>
                                    <tr><td>195</td><td>Senegal</td><td>Republic of Senegal</td><td>221</td><td>SN</td><td>SEN</td><td>686</td><td>.sn</td><td>yes</td></tr>
                                    <tr><td>196</td><td>Serbia</td><td>Republic of Serbia</td><td>381</td><td>RS</td><td>SRB</td><td>688</td><td>.rs</td><td>yes</td></tr>
                                    <tr><td>197</td><td>Seychelles</td><td>Republic of Seychelles</td><td>248</td><td>SC</td><td>SYC</td><td>690</td><td>.sc</td><td>yes</td></tr>
                                    <tr><td>198</td><td>Sierra Leone</td><td>Republic of Sierra Leone</td><td>232</td><td>SL</td><td>SLE</td><td>694</td><td>.sl</td><td>yes</td></tr>
                                    <tr><td>199</td><td>Singapore</td><td>Republic of Singapore</td><td>65</td><td>SG</td><td>SGP</td><td>702</td><td>.sg</td><td>yes</td></tr>
                                    <tr><td>200</td><td>Sint Maarten</td><td>Sint Maarten</td><td>1+721</td><td>SX</td><td>SXM</td><td>534</td><td>.sx</td><td>no</td></tr>
                                    <tr><td>201</td><td>Slovakia</td><td>Slovak Republic</td><td>421</td><td>SK</td><td>SVK</td><td>703</td><td>.sk</td><td>yes</td></tr>
                                    <tr><td>202</td><td>Slovenia</td><td>Republic of Slovenia</td><td>386</td><td>SI</td><td>SVN</td><td>705</td><td>.si</td><td>yes</td></tr>
                                    <tr><td>203</td><td>Solomon Islands</td><td>Solomon Islands</td><td>677</td><td>SB</td><td>SLB</td><td>090</td><td>.sb</td><td>yes</td></tr>
                                    <tr><td>204</td><td>Somalia</td><td>Somali Republic</td><td>252</td><td>SO</td><td>SOM</td><td>706</td><td>.so</td><td>yes</td></tr>
                                    <tr><td>205</td><td>South Africa</td><td>Republic of South Africa</td><td>27</td><td>ZA</td><td>ZAF</td><td>710</td><td>.za</td><td>yes</td></tr>
                                    <tr><td>206</td><td>South Georgia and the South Sandwich Islands</td><td>South Georgia and the South Sandwich Islands</td><td>500</td><td>GS</td><td>SGS</td><td>239</td><td>.gs</td><td>no</td></tr>
                                    <tr><td>207</td><td>South Korea</td><td>Republic of Korea</td><td>82</td><td>KR</td><td>KOR</td><td>410</td><td>.kr</td><td>yes</td></tr>
                                    <tr><td>208</td><td>South Sudan</td><td>Republic of South Sudan</td><td>211</td><td>SS</td><td>SSD</td><td>728</td><td>.ss</td><td>yes</td></tr>
                                    <tr><td>209</td><td>Spain</td><td>Kingdom of Spain</td><td>34</td><td>ES</td><td>ESP</td><td>724</td><td>.es</td><td>yes</td></tr>
                                    <tr><td>210</td><td>Sri Lanka</td><td>Democratic Socialist Republic of Sri Lanka</td><td>94</td><td>LK</td><td>LKA</td><td>144</td><td>.lk</td><td>yes</td></tr>
                                    <tr><td>211</td><td>Sudan</td><td>Republic of the Sudan</td><td>249</td><td>SD</td><td>SDN</td><td>729</td><td>.sd</td><td>yes</td></tr>
                                    <tr><td>212</td><td>Suriname</td><td>Republic of Suriname</td><td>597</td><td>SR</td><td>SUR</td><td>740</td><td>.sr</td><td>yes</td></tr>
                                    <tr><td>213</td><td>Svalbard and Jan Mayen</td><td>Svalbard and Jan Mayen</td><td>47</td><td>SJ</td><td>SJM</td><td>744</td><td>.sj</td><td>no</td></tr>
                                    <tr><td>214</td><td>Swaziland</td><td>Kingdom of Swaziland</td><td>268</td><td>SZ</td><td>SWZ</td><td>748</td><td>.sz</td><td>yes</td></tr>
                                    <tr><td>215</td><td>Sweden</td><td>Kingdom of Sweden</td><td>46</td><td>SE</td><td>SWE</td><td>752</td><td>.se</td><td>yes</td></tr>
                                    <tr><td>216</td><td>Switzerland</td><td>Swiss Confederation</td><td>41</td><td>CH</td><td>CHE</td><td>756</td><td>.ch</td><td>yes</td></tr>
                                    <tr><td>217</td><td>Syria</td><td>Syrian Arab Republic</td><td>963</td><td>SY</td><td>SYR</td><td>760</td><td>.sy</td><td>yes</td></tr>
                                    <tr><td>218</td><td>Taiwan</td><td>Republic of China (Taiwan)</td><td>886</td><td>TW</td><td>TWN</td><td>158</td><td>.tw</td><td>former</td></tr>
                                    <tr><td>219</td><td>Tajikistan</td><td>Republic of Tajikistan</td><td>992</td><td>TJ</td><td>TJK</td><td>762</td><td>.tj</td><td>yes</td></tr>
                                    <tr><td>220</td><td>Tanzania</td><td>United Republic of Tanzania</td><td>255</td><td>TZ</td><td>TZA</td><td>834</td><td>.tz</td><td>yes</td></tr>
                                    <tr><td>221</td><td>Thailand</td><td>Kingdom of Thailand</td><td>66</td><td>TH</td><td>THA</td><td>764</td><td>.th</td><td>yes</td></tr>
                                    <tr><td>222</td><td>Timor-Leste (East Timor)</td><td>Democratic Republic of Timor-Leste</td><td>670</td><td>TL</td><td>TLS</td><td>626</td><td>.tl</td><td>yes</td></tr>
                                    <tr><td>223</td><td>Togo</td><td>Togolese Republic</td><td>228</td><td>TG</td><td>TGO</td><td>768</td><td>.tg</td><td>yes</td></tr>
                                    <tr><td>224</td><td>Tokelau</td><td>Tokelau</td><td>690</td><td>TK</td><td>TKL</td><td>772</td><td>.tk</td><td>no</td></tr>
                                    <tr><td>225</td><td>Tonga</td><td>Kingdom of Tonga</td><td>676</td><td>TO</td><td>TON</td><td>776</td><td>.to</td><td>yes</td></tr>
                                    <tr><td>226</td><td>Trinidad and Tobago</td><td>Republic of Trinidad and Tobago</td><td>1+868</td><td>TT</td><td>TTO</td><td>780</td><td>.tt</td><td>yes</td></tr>
                                    <tr><td>227</td><td>Tunisia</td><td>Republic of Tunisia</td><td>216</td><td>TN</td><td>TUN</td><td>788</td><td>.tn</td><td>yes</td></tr>
                                    <tr><td>228</td><td>Turkey</td><td>Republic of Turkey</td><td>90</td><td>TR</td><td>TUR</td><td>792</td><td>.tr</td><td>yes</td></tr>
                                    <tr><td>229</td><td>Turkmenistan</td><td>Turkmenistan</td><td>993</td><td>TM</td><td>TKM</td><td>795</td><td>.tm</td><td>yes</td></tr>
                                    <tr><td>230</td><td>Turks and Caicos Islands</td><td>Turks and Caicos Islands</td><td>1+649</td><td>TC</td><td>TCA</td><td>796</td><td>.tc</td><td>no</td></tr>
                                    <tr><td>231</td><td>Tuvalu</td><td>Tuvalu</td><td>688</td><td>TV</td><td>TUV</td><td>798</td><td>.tv</td><td>yes</td></tr>
                                    <tr><td>232</td><td>Uganda</td><td>Republic of Uganda</td><td>256</td><td>UG</td><td>UGA</td><td>800</td><td>.ug</td><td>yes</td></tr>
                                    <tr><td>233</td><td>Ukraine</td><td>Ukraine</td><td>380</td><td>UA</td><td>UKR</td><td>804</td><td>.ua</td><td>yes</td></tr>
                                    <tr><td>234</td><td>United Arab Emirates</td><td>United Arab Emirates</td><td>971</td><td>AE</td><td>ARE</td><td>784</td><td>.ae</td><td>yes</td></tr>
                                    <tr><td>235</td><td>United Kingdom</td><td>United Kingdom of Great Britain and Nothern Ireland</td><td>44</td><td>GB</td><td>GBR</td><td>826</td><td>.uk</td><td>yes</td></tr>
                                    <tr><td>236</td><td>United States</td><td>United States of America</td><td>1</td><td>US</td><td>USA</td><td>840</td><td>.us</td><td>yes</td></tr>
                                    <tr><td>237</td><td>United States Minor Outlying Islands</td><td>United States Minor Outlying Islands</td><td>NONE</td><td>UM</td><td>UMI</td><td>581</td><td>NONE</td><td>no</td></tr>
                                    <tr><td>238</td><td>Uruguay</td><td>Eastern Republic of Uruguay</td><td>598</td><td>UY</td><td>URY</td><td>858</td><td>.uy</td><td>yes</td></tr>
                                    <tr><td>239</td><td>Uzbekistan</td><td>Republic of Uzbekistan</td><td>998</td><td>UZ</td><td>UZB</td><td>860</td><td>.uz</td><td>yes</td></tr>
                                    <tr><td>240</td><td>Vanuatu</td><td>Republic of Vanuatu</td><td>678</td><td>VU</td><td>VUT</td><td>548</td><td>.vu</td><td>yes</td></tr>
                                    <tr><td>241</td><td>Vatican City</td><td>State of the Vatican City</td><td>39</td><td>VA</td><td>VAT</td><td>336</td><td>.va</td><td>no</td></tr>
                                    <tr><td>242</td><td>Venezuela</td><td>Bolivarian Republic of Venezuela</td><td>58</td><td>VE</td><td>VEN</td><td>862</td><td>.ve</td><td>yes</td></tr>
                                    <tr><td>243</td><td>Vietnam</td><td>Socialist Republic of Vietnam</td><td>84</td><td>VN</td><td>VNM</td><td>704</td><td>.vn</td><td>yes</td></tr>
                                    <tr><td>244</td><td>Virgin Islands, British</td><td>British Virgin Islands</td><td>1+284</td><td>VG</td><td>VGB</td><td>092</td><td>.vg</td><td>no</td></tr>
                                    <tr><td>245</td><td>Virgin Islands, US</td><td>Virgin Islands of the United States</td><td>1+340</td><td>VI</td><td>VIR</td><td>850</td><td>.vi</td><td>no</td></tr>
                                    <tr><td>246</td><td>Wallis and Futuna</td><td>Wallis and Futuna</td><td>681</td><td>WF</td><td>WLF</td><td>876</td><td>.wf</td><td>no</td></tr>
                                    <tr><td>247</td><td>Western Sahara</td><td>Western Sahara</td><td>212</td><td>EH</td><td>ESH</td><td>732</td><td>.eh</td><td>no</td></tr>
                                    <tr><td>248</td><td>Yemen</td><td>Republic of Yemen</td><td>967</td><td>YE</td><td>YEM</td><td>887</td><td>.ye</td><td>yes</td></tr>
                                    <tr><td>249</td><td>Zambia</td><td>Republic of Zambia</td><td>260</td><td>ZM</td><td>ZMB</td><td>894</td><td>.zm</td><td>yes</td></tr>
                                    <tr><td>250</td><td>Zimbabwe</td><td>Republic of Zimbabwe</td><td>263</td><td>ZW</td><td>ZWE</td><td>716</td><td>.zw</td><td>yes</td></tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span4">
                        <div class="w-box hideable">
                            <div class="w-box-header">
                                <h4>Latest comments</h4>
                                <i class="icsw16-speech-bubble icsw16-white pull-right"></i>
                            </div>
                            <div class="w-box-content">
                                <table class="table table-striped table-list">
                                    <tbody>
                                        <tr>
                                            <td class="list-image"><a href="javascript:void(0)" title="Comment by Summer Throssell" class="ptip_ne"><i class="splashy-comments"></i></a></td>
                                            <td>
                                                <a href="javascript:void(0)" class="list-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec cursus dictum rhoncus...</a>
                                                <span class="minor">on October 24 @ 7:23</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="list-image"><a href="javascript:void(0)" title="Comment by Summer Throssell" class="ptip_ne"><i class="splashy-comments"></i></a></td>
                                            <td>
                                                <a href="javascript:void(0)" class="list-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec cursus dictum rhoncus...</a>
                                                <span class="minor">on October 24 @ 7:23</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="list-image"><a href="javascript:void(0)" title="Comment by Summer Throssell" class="ptip_ne"><i class="splashy-comments"></i></a></td>
                                            <td>
                                                <a href="javascript:void(0)" class="list-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec cursus dictum rhoncus. Duis quis pretium massa. Integer laoreet erat id neque interdum...</a>
                                                <span class="minor">on October 24 @ 7:23</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="list-image"><a href="javascript:void(0)" title="Comment by Summer Throssell" class="ptip_ne"><i class="splashy-comments"></i></a></td>
                                            <td>
                                                <a href="javascript:void(0)" class="list-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec cursus dictum rhoncus...</a>
                                                <span class="minor">on October 24 @ 7:23</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="list-image"><a href="javascript:void(0)" title="Comment by Summer Throssell" class="ptip_ne"><i class="splashy-comments"></i></a></td>
                                            <td>
                                                <a href="javascript:void(0)" class="list-text">Lorem ipsum dolor sit amet...</a>
                                                <span class="minor">on October 24 @ 7:23</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                         </div>
                    </div>
                    <div class="span8">
                        <div class="w-box w-box-blue">
                            <div class="w-box-header">
                            </div>
                            <div class="w-box-content">
                                <div id="calendar_widget"></div>
                            </div>
                         </div>
                    </div>  
                </div>
            </div>
            <div class="footer_space"></div>
        </div> 

@endsection

@section('script')
<!-- colorbox -->
            <script src="{{asset('public/js/lib/colorbox/jquery.colorbox.min.js')}}"></script>
        <!-- fullcalendar -->
            <script src="{{asset('public/js/lib/fullcalendar/fullcalendar.min.js')}}"></script>
        <!-- flot charts -->
            <script src="{{asset('public/js/lib/flot-charts/jquery.flot.js')}}"></script>
            <script src="{{asset('public/js/lib/flot-charts/jquery.flot.resize.js')}}"></script>
            <script src="{{asset('public/js/lib/flot-charts/jquery.flot.pie.js')}}"></script>
            <script src="{{asset('public/js/lib/flot-charts/jquery.flot.orderBars.js')}}"></script>
            <script src="{{asset('public/js/lib/flot-charts/jquery.flot.tooltip.js')}}"></script>
            <script src="{{asset('public/js/lib/flot-charts/jquery.flot.time.js')}}"></script>
        <!-- responsive carousel -->
            <script src="{{asset('public/js/lib/carousel/plugin.min.js')}}"></script>
        <!-- responsive image grid -->
            <script src="{{asset('public/js/lib/wookmark/jquery.imagesloaded.min.js')}}"></script>
            <script src="{{asset('public/js/lib/wookmark/jquery.wookmark.min.js')}}"></script>

            <script src="{{asset('public/js/pages/beoro_dashboard.js')}}"></script>
 <!-- datatables -->
            <script src="{{asset('public/js/lib/datatables/js/jquery.dataTables.min.js')}}"></script>
        <!-- datatables column reorder -->
            <script src="{{asset('public/js/lib/datatables/extras/ColReorder/media/js/ColReorder.min.js')}}"></script>
        <!-- datatables column toggle visibility -->
            <script src="{{asset('public/js/lib/datatables/extras/ColVis/media/js/ColVis.min.js')}}"></script>
        <!-- datatable table tools -->
            <script src="{{asset('public/js/lib/datatables/extras/TableTools/media/js/TableTools.min.js')}}"></script>
            <script src="{{asset('public/js/lib/datatables/extras/TableTools/media/js/ZeroClipboard.js')}}"></script>
        <!-- datatables bootstrap integration -->
            <script src="{{asset('public/js/lib/datatables/js/jquery.dataTables.bootstrap.min.js')}}"></script>

            <script src="{{asset('public/js/pages/beoro_datatables.js')}}"></script>
@endsection
