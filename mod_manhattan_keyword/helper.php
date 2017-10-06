<?php defined('_JEXEC') or die;

use Joomla\CMS\Http\HttpFactory;
use Joomla\Registry\Registry;

/**
 * Class ModManhattanKeywordHelper
 */
class ModManhattanKeywordHelper
{

    /**
     * Get the rankings for a specified keyword from manhattan api
     *
     * @param Registry $params
     *
     * @return array
     */
    public function getData(Registry $params)
    {
        // Create an instance of a default Http object.
        $http = HttpFactory::getHttp();

        // Create the url
        $url = "https://www.manhattan-tool.com/customKeywords/api/"
            . urlencode(trim($params->get("api_key")))
            . "?action=custom_kw_rankings&keyword="
            . urlencode(trim(strtolower($params->get("keyword"))))
            . "&changes=1";

        // Make http request and deocode json data
        $response = $http->get($url);
        $data = json_decode($response->body);

        // Check for http success
        if ($response->code !== 200) {
            throw new RuntimeException("[$response->code] Unable to get data from manhatten api: " . $data->exception);
        }

        // Check the data
        if (!$data || !isset($data->customRankings)) {
            throw new UnexpectedValueException("Unexpected data received from manhatten api: `{$response->body}`.");
        }

        // Slice the data
        if ($maxKeywords = (int)$params->get('max_keywords', 10)) {
            $data->customRankings = array_slice($data->customRankings, 0, $maxKeywords);
        }

        return $data;
    }
}
