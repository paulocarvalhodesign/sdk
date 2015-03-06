<?php
namespace Fortifi\Sdk\Models\Affiliate\Policies;

use Fortifi\FortifiApi\Affiliate\Endpoints\Policies\AffiliateReversalPolicyEndpoint;
use Fortifi\FortifiApi\Affiliate\Payloads\Policies\ListAffiliatePolicyPayload;
use Fortifi\FortifiApi\Affiliate\Payloads\Policies\Reversal\CreateAffiliateReversalPolicyPayload;
use Fortifi\FortifiApi\Affiliate\Payloads\Policies\Reversal\UpdateAffiliateReversalPolicyPayload;
use Fortifi\FortifiApi\Affiliate\Responses\Policies\Reversal\AffiliateReversalPoliciesResponse;
use Fortifi\FortifiApi\Affiliate\Responses\Policies\Reversal\AffiliateReversalPolicyResponse;
use Fortifi\FortifiApi\Affiliate\Responses\Policies\Reversal\CreateAffiliateReversalPolicyResponse;
use Fortifi\FortifiApi\Foundation\Payloads\FidPayload;
use Fortifi\FortifiApi\Foundation\Requests\FortifiApiRequestInterface;
use Fortifi\FortifiApi\Foundation\Responses\BoolResponse;
use Fortifi\Sdk\Models\Api\FortifiApiModel;

class AffiliateReversalPolicyModel extends FortifiApiModel
{
  /**
   * @param string $companyFid;
   * @param string $affiliateFid;
   * @param string $foundationFid;
   *
   * @return AffiliateReversalPoliciesResponse|FortifiApiRequestInterface
   */
  public function all(
    $companyFid = null, $affiliateFid = null, $foundationFid = null
  )
  {
    $payload = new ListAffiliatePolicyPayload();
    $payload->companyFid = $companyFid;
    $payload->affiliateFid = $affiliateFid;
    $payload->foundationFid = $foundationFid;

    $ep = AffiliateReversalPolicyEndpoint::bound($this->getApi());
    return $ep->all($payload)->get();
  }

  /**
   * @param string $fid
   *
   * @return AffiliateReversalPolicyResponse|FortifiApiRequestInterface
   */
  public function retrieve($fid)
  {
    $payload = new FidPayload();
    $payload->fid = $fid;

    $ep = AffiliateReversalPolicyEndpoint::bound($this->getApi());
    return $ep->retrieve($payload)->get();
  }

  /**
   * @param string $companyFid
   * @param string $resourceFid
   * @param string $campaignHash
   * @param string $sid1
   * @param string $sid2
   * @param string $sid3
   * @param string $action
   * @param string $country
   * @param string $platform
   * @param string $description
   * @param string $reason
   * @param int    $acceptDays
   * @param int    $fee
   * @param int    $commissionPercentage
   *
   * @return FortifiApiRequestInterface|CreateAffiliateReversalPolicyResponse
   */
  public function create(
    $companyFid, $resourceFid, $campaignHash,
    $sid1, $sid2, $sid3, $action, $country, $platform, $description,
    $reason, $acceptDays, $fee, $commissionPercentage
  )
  {
    $payload = new CreateAffiliateReversalPolicyPayload();
    $payload->companyFid = (string)$companyFid;
    $payload->resourceFid = $resourceFid;
    $payload->campaignHash = $campaignHash;
    $payload->sid1 = $sid1;
    $payload->sid2 = $sid2;
    $payload->sid3 = $sid3;
    $payload->action = $action;
    $payload->country = $country;
    $payload->platform = $platform;
    $payload->description = $description;
    $payload->reason = $reason;
    $payload->acceptDays = $acceptDays;
    $payload->fee = $fee;
    $payload->commissionPercentage = $commissionPercentage;

    $ep = AffiliateReversalPolicyEndpoint::bound($this->getApi());
    return $ep->create($payload)->get();
  }

  /**
   * @param string $fid
   * @param string $description
   * @param string $reason
   * @param int    $acceptDays
   * @param int    $fee
   * @param int    $commissionPercentage
   *
   * @return FortifiApiRequestInterface|BoolResponse
   */
  public function update(
    $fid, $description,
    $reason, $acceptDays, $fee, $commissionPercentage
  )
  {
    $payload = new UpdateAffiliateReversalPolicyPayload();
    $payload->fid = $fid;
    $payload->description = $description;
    $payload->reason = $reason;
    $payload->acceptDays = $acceptDays;
    $payload->fee = $fee;
    $payload->commissionPercentage = $commissionPercentage;

    $ep = AffiliateReversalPolicyEndpoint::bound($this->getApi());
    return $ep->update($payload)->get();
  }

  /**
   * @param string $fid
   *
   * @return FortifiApiRequestInterface|BoolResponse
   */
  public function delete($fid)
  {
    $payload = new FidPayload();
    $payload->fid = $fid;

    $ep = AffiliateReversalPolicyEndpoint::bound($this->getApi());
    return $ep->delete($payload)->get();
  }

  /**
   * @param string $fid
   *
   * @return FortifiApiRequestInterface|BoolResponse
   */
  public function restore($fid)
  {
    $payload = new FidPayload();
    $payload->fid = $fid;

    $ep = AffiliateReversalPolicyEndpoint::bound($this->getApi());
    return $ep->restore($payload)->get();
  }
}
