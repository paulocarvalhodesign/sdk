<?php
namespace Fortifi\Sdk\Models\Affiliate;

use Fortifi\FortifiApi\Affiliate\Endpoints\AffiliateEndpoint;
use Fortifi\FortifiApi\Affiliate\Payloads\CreateAffiliatePayload;
use Fortifi\FortifiApi\Affiliate\Payloads\SetAffiliateAccountManagerPayload;
use Fortifi\FortifiApi\Affiliate\Payloads\SetAffiliateNamePayload;
use Fortifi\FortifiApi\Affiliate\Payloads\SetAffiliateTypePayload;
use Fortifi\FortifiApi\Affiliate\Payloads\SetAffiliateWebsitePayload;
use Fortifi\FortifiApi\Affiliate\Responses\AffiliateResponse;
use Fortifi\FortifiApi\Affiliate\Responses\AffiliatesResponse;
use Fortifi\FortifiApi\Affiliate\Responses\CreateAffiliateResponse;
use Fortifi\FortifiApi\Foundation\Payloads\FidPayload;
use Fortifi\FortifiApi\Foundation\Payloads\PaginatedDataNodePayload;
use Fortifi\FortifiApi\Foundation\Requests\FortifiApiRequestInterface;
use Fortifi\FortifiApi\Foundation\Responses\BoolResponse;
use Fortifi\Sdk\Models\Api\FortifiApiModel;

class AffiliateModel extends FortifiApiModel
{
  /**
   * @param int    $limit
   * @param int    $page
   * @param string $sortField
   * @param string $sortDirection
   * @param bool   $showDeleted
   * @param string $filter
   *
   * @return AffiliatesResponse|FortifiApiRequestInterface
   */
  public function all($limit = null, $page = null,
    $sortField = null, $sortDirection = null,
    $showDeleted = false, $filter = null
  )
  {
    $payload                = new PaginatedDataNodePayload();
    $payload->limit         = $limit;
    $payload->page          = $page;
    $payload->sortField     = $sortField;
    $payload->sortDirection = $sortDirection;
    $payload->showDeleted   = $showDeleted;
    $payload->filter        = $filter;

    $ep = AffiliateEndpoint::bound($this->getApi());
    return $ep->all($payload)->get();
  }

  /**
   * @param string $fid
   *
   * @return AffiliateResponse|FortifiApiRequestInterface
   */
  public function retrieve($fid)
  {
    $payload      = new FidPayload();
    $payload->fid = $fid;

    $ep = AffiliateEndpoint::bound($this->getApi());
    return $ep->retrieve($payload)->get();
  }

  /**
   * @param string $type
   * @param string $displayName
   * @param string $name
   * @param string $phone
   * @param string $email
   * @param string $website
   * @param string $accountManagerFid
   *
   * @return FortifiApiRequestInterface|CreateAffiliateResponse
   */
  public function create($type, $displayName,
    $name, $phone, $email, $website, $accountManagerFid
  )
  {
    $payload                    = new CreateAffiliatePayload();
    $payload->type              = $type;
    $payload->displayName       = $displayName;
    $payload->name              = $name;
    $payload->phone             = $phone;
    $payload->email             = $email;
    $payload->website           = $website;
    $payload->accountManagerFid = $accountManagerFid;

    $ep = AffiliateEndpoint::bound($this->getApi());
    return $ep->create($payload)->get();
  }

  /**
   * @param string $fid
   * @param string $displayName
   * @param string $name
   *
   * @return FortifiApiRequestInterface|BoolResponse
   */
  public function setName($fid, $displayName, $name)
  {
    $payload              = new SetAffiliateNamePayload();
    $payload->fid         = $fid;
    $payload->displayName = $displayName;
    $payload->name        = $name;

    $ep = AffiliateEndpoint::bound($this->getApi());
    return $ep->setName($payload)->get();
  }

  /**
   * @param string $fid
   *
   * @return FortifiApiRequestInterface|BoolResponse
   */
  public function delete($fid)
  {
    $payload      = new FidPayload();
    $payload->fid = $fid;

    $ep = AffiliateEndpoint::bound($this->getApi());
    return $ep->delete($payload)->get();
  }

  /**
   * @param string $fid
   *
   * @return FortifiApiRequestInterface|BoolResponse
   */
  public function restore($fid)
  {
    $payload      = new FidPayload();
    $payload->fid = $fid;

    $ep = AffiliateEndpoint::bound($this->getApi());
    return $ep->restore($payload)->get();
  }

  /**
   * @param string $fid
   *
   * @return FortifiApiRequestInterface|BoolResponse
   */
  public function suspend($fid)
  {
    $payload      = new FidPayload();
    $payload->fid = $fid;

    $ep = AffiliateEndpoint::bound($this->getApi());
    return $ep->suspend($payload)->get();
  }

  /**
   * @param string $fid
   *
   * @return FortifiApiRequestInterface|BoolResponse
   */
  public function reactivate($fid)
  {
    $payload      = new FidPayload();
    $payload->fid = $fid;

    $ep = AffiliateEndpoint::bound($this->getApi());
    return $ep->reactivate($payload)->get();
  }

  /**
   * @param string $fid
   * @param string $website
   *
   * @return FortifiApiRequestInterface|BoolResponse
   */
  public function setWebsite($fid, $website)
  {
    $payload          = new SetAffiliateWebsitePayload();
    $payload->fid     = $fid;
    $payload->website = $website;

    $ep = AffiliateEndpoint::bound($this->getApi());
    return $ep->setWebsite($payload)->get();
  }

  /**
   * @param string $fid
   * @param string $type
   *
   * @return FortifiApiRequestInterface|BoolResponse
   */
  public function SetType($fid, $type)
  {
    $payload        = new SetAffiliateTypePayload();
    $payload->fid   = $fid;
    $payload->type  = $type;

    $ep = AffiliateEndpoint::bound($this->getApi());
    return $ep->setType($payload)->get();
  }

  /**
   * @param string $fid
   * @param string $accountManagerFid
   *
   * @return FortifiApiRequestInterface|BoolResponse
   */
  public function setAccountManager($fid, $accountManagerFid)
  {
    $payload                    = new SetAffiliateAccountManagerPayload();
    $payload->fid               = $fid;
    $payload->accountManagerFid = $accountManagerFid;

    $ep = AffiliateEndpoint::bound($this->getApi());
    return $ep->setAccountManager($payload)->get();
  }

}
