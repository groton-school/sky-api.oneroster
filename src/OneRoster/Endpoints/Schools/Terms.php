<?php

namespace Blackbaud\SKY\OneRoster\Endpoints\Schools;

use Battis\OpenAPI\Client\BaseEndpoint;
use Battis\OpenAPI\Client\Exceptions\ArgumentException;
use Blackbaud\SKY\OneRoster\Components\AcademicSessionsOutputModel;

/**
 * @api
 */
class Terms extends BaseEndpoint
{
    /**
     * @var string $url Endpoint URL pattern
     */
    protected string $url = "https://api.sky.blackbaud.com/afe-rostr/ims/oneroster/v1p1/schools/{school_id}/terms";

    /**
     * Returns a collection of terms for the specified ```school\_id```.
     *
     * @param array{school_id: string} $params An associative array
     *     - school_id: sourcedId for the school
     *
     * @return \Blackbaud\SKY\OneRoster\Components\AcademicSessionsOutputModel
     *   OK - It was possible to read the collection.
     *
     * @throws \Battis\OpenAPI\Client\Exceptions\ArgumentException if required
     *   parameters are not defined
     */
    public function getBySchoolId(array $params): AcademicSessionsOutputModel
    {
        assert(isset($params['school_id']), new ArgumentException("Parameter `school_id` is required"));

        return new AcademicSessionsOutputModel($this->send("get", array_filter($params, fn($key) => in_array($key, ['school_id']), ARRAY_FILTER_USE_KEY), []));
    }
}
