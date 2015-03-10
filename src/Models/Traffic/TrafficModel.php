<?php
namespace Fortifi\Sdk\Models\Traffic;

use Fortifi\FortifiApi\Foundation\Requests\FortifiApiRequestInterface;
use Fortifi\FortifiApi\Traffic\Endpoints\TrafficEndpoint;
use Fortifi\FortifiApi\Traffic\Payloads\AffiliateVisitorPayload;
use Fortifi\FortifiApi\Traffic\Payloads\VisitorPayload;
use Fortifi\FortifiApi\Traffic\Responses\AffiliateVisitorResponse;
use Fortifi\FortifiApi\Traffic\Responses\VisitorDevicesResponse;
use Fortifi\FortifiApi\Traffic\Responses\VisitorResponse;
use Fortifi\Sdk\Models\Api\FortifiApiModel;

class TrafficModel extends FortifiApiModel
{
  /**
   * @param int $visitorId
   *
   * @return FortifiApiRequestInterface|VisitorResponse
   */
  public function visitor($visitorId)
  {
    $payload = new VisitorPayload();
    $payload->visitorId = $visitorId;

    $ep = TrafficEndpoint::bound($this->getApi());
    return $ep->visitor($payload)->get();
  }

  /**
   * @param string $affiliateFid
   * @param int    $visitorId
   *
   * @return FortifiApiRequestInterface|AffiliateVisitorResponse
   */
  public function affiliateVisitor($affiliateFid, $visitorId)
  {
    $payload = new AffiliateVisitorPayload();
    $payload->affiliateFid = $affiliateFid;
    $payload->visitorId = $visitorId;

    $ep = TrafficEndpoint::bound($this->getApi());
    return $ep->affiliateVisitor($payload)->get();
  }

  /**
   * @param string $visitorId
   *
   * @return FortifiApiRequestInterface|VisitorDevicesResponse
   */
  public function devices($visitorId)
  {
    $payload = new VisitorPayload();
    $payload->visitorId = $visitorId;

    $ep = TrafficEndpoint::bound($this->getApi());
    return $ep->devices($payload)->get();
  }
}
