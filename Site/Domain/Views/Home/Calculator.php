<?php
    function CalculatorView() {
        return '<div class="text-center clearfix">
        <script src="/js/calc.js"></script>
        <div class="calc">
            <form method="get" action="" name="calc">
                <table align="center" cellspacing="5" cellpadding="0">
                    <tbody>
                        <tr><td colspan="2" align="left"><b>Тип а/б смеси</b></td></tr>
                        <tr>
                            <td colspan="2" align="left" style="padding-bottom:10px;">
                                <select id="calc-asphalt-sel" onchange="Calc.changeType(this)">
                                    <option selected="">МА I</option><option>МБ I</option><option>МБ II</option><option>МБ III</option><option>МВ II</option><option>КБ I</option><option>КП I</option><option>Л IV</option><option>ПД II</option><option>ПГ I</option><option>ЩМА-20; ЩМА-15</option><option>ЩМА 20; ЩМА-15 на ПБВ</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="250" align="left">Расстояние, м</td>
                            <td align="right">
                                <input class="calc-tf" type="text" onfocus="this.select()" onkeyup="Calc.tfChanged(this)" value="10" name="l" size="5">
                            </td>
                        </tr>
                        <tr>
                            <td align="left">Ширина покрытия, м</td>
                            <td align="right">
                                <input class="calc-tf" type="text" onfocus="this.select()" onkeyup="Calc.tfChanged(this)" value="3" name="w" size="5">
                            </td>
                        </tr>
                        <tr>
                            <td align="left">Толщина слоя, см</td>
                            <td align="right">
                                <input class="calc-tf" type="text" onfocus="this.select()" onkeyup="Calc.tfChanged(this)" value="5" name="h" size="5">
                            </td>
                        </tr>
                        <tr>
                            <td class="calc-result" align="left"><b>Расход асфальта составит:&nbsp;&nbsp;</b></td>
                            <td class="calc-result" id="calc-res" align="left"><b>3,540 тонн</b></td>
                        </tr></tbody></table></form></div></div>';
    }