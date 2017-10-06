<div class="mod-manhattan-domain mod-manhattan-domain-table">
    <table class="table">
        <thead>
        <tr>
            <th class="keyword-name"><?php echo JText::_('MOD_MANHATTAN_DOMAIN_KEYWORD'); ?></th>
            <th class="position"><?php echo JText::_('MOD_MANHATTAN_DOMAIN_POSITION'); ?></th>
            <th class="position-trend"><?php echo JText::_('MOD_MANHATTAN_DOMAIN_POSITION_TREND'); ?></th>
            <th class="search-volume"><?php echo JText::_('MOD_MANHATTAN_DOMAIN_SEARCH_RESULTS_TOTAL'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data->customRankings AS $customRanking) : ?>
            <tr class="keyword">
                <td class="keyword-name"><?php echo $customRanking->keyword ?></td>
                <td class="keyword-position"><?php echo $customRanking->position ?></td>
                <td class="keyword-position-trend">
                    <?php
                    if ($customRanking->position_change < 0) {
                        $trendClass = "negative";
                        $trendText  = $customRanking->position_change;
                    } else {
                        if ($customRanking->position_change > 0) {
                            $trendClass = 'positive';
                            $trendText  = '+' . $customRanking->position_change;
                        } else {
                            $trendText = '';
                            if ($customRanking->position_change === 0) {
                                $trendClass = 'no-change';
                            } else {
                                $trendClass = 'new';
                            }
                        }
                    }
                    ?>
                    <span class="<?php echo $trendClass; ?>"><?php echo $trendText; ?></span>
                </td>
                <td class="keyword-search-results-total"><?php echo number_format($customRanking->total, 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="last-updated">
        <?php echo JText::_('MOD_MANHATTAN_DOMAIN_LAST_UPDATED'); ?>:
        <?php echo JHtml::_('date', $data->request_info->datetime, 'd.m.Y H:i'); ?>
    </div>
</div>