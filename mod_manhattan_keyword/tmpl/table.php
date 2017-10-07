<?php
$highlightedDomain = $params->get('highlight_domain');
?>
<div class="mod-manhattan-keyword mod-manhattan-keyword-table">
    <table class="table">
        <thead>
        <tr>
            <th class="ranking-position"><?php echo JText::_('MOD_MANHATTAN_DOMAIN_POSITION'); ?></th>
            <th class="ranking-url"><?php echo JText::_('MOD_MANHATTAN_KEYWORD_URL'); ?></th>
            <th class="ranking-position-trend"><?php echo JText::_('MOD_MANHATTAN_DOMAIN_POSITION_TREND'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data->customRankings AS $ranking) : ?>
            <tr <?php echo ($ranking->domain == $highlightedDomain) ? 'class="highlight"' : ''; ?>>
                <td class="ranking-position"><?php echo $ranking->position ?></td>
                <td class="ranking-url">
                    <span class="ranking-domain"><?php echo $ranking->domain ?></span><span class="ranking-path"><?php echo rtrim($ranking->path, '/'); ?></span>
                </td>
                <td class="ranking-position-trend">
                    <?php
                    if ($ranking->position_change < 0) {
                        $trendClass = "negative";
                        $trendText  = $ranking->position_change;
                    } else {
                        if ($ranking->position_change > 0) {
                            $trendClass = 'positive';
                            $trendText  = '+' . $ranking->position_change;
                        } else {
                            $trendText = '';
                            if ($ranking->position_change === 0) {
                                $trendClass = 'no-change';
                            } else {
                                $trendClass = 'new';
                            }
                        }
                    }
                    ?>
                    <span class="<?php echo $trendClass; ?>"><?php echo $trendText; ?></span>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="table-footer">
        <?php if (isset($data->customRankings[0]) && $data->customRankings[0]->total) : ?>
            <div class="search-results-total">
                <?php echo JText::_('MOD_MANHATTAN_KEYWORD_SEARCH_RESULTS_TOTAL'); ?>:
                <?php echo $data->customRankings[0]->total; ?>
            </div>
        <?php endif; ?>
        <div class="last-updated">
            <?php echo JText::_('MOD_MANHATTAN_DOMAIN_LAST_UPDATED'); ?>:
            <?php echo JHtml::_('date', $data->request_info->datetime, 'd.m.Y H:i'); ?>
        </div>
    </div>
</div>