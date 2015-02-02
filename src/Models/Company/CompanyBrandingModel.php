<?php
namespace Fortifi\Sdk\Models\Company;

use Fortifi\FortifiApi\Company\Endpoints\CompanyBrandingEndpoint;
use Fortifi\FortifiApi\Company\Payloads\CompanyBrandingPayload;
use Fortifi\FortifiApi\Company\Responses\CompanyBrandingResponse;
use Fortifi\FortifiApi\Foundation\Payloads\FidPayload;
use Fortifi\FortifiApi\Foundation\Requests\FortifiApiRequestInterface;
use Fortifi\FortifiApi\Foundation\Responses\FidResponse;
use Fortifi\Sdk\Models\Api\FortifiApiModel;

class CompanyBrandingModel extends FortifiApiModel
{
  /**
   * @param string $companyFid
   *
   * @return CompanyBrandingResponse|FortifiApiRequestInterface
   */
  public function getCompanyBranding($companyFid)
  {
    $payload      = new FidPayload();
    $payload->fid = $companyFid;

    $ep = CompanyBrandingEndpoint::bound($this->getApi());
    return $ep->getCompanyBranding($payload)->get();
  }

  /**
   * @param string $companyFid
   * @param string $theme
   * @param string $logoUrl
   * @param string $fid
   *
   * @return FortifiApiRequestInterface|FidResponse
   */
  public function setCompanyBranding($companyFid, $theme, $logoUrl, $fid = null)
  {
    $payload             = new CompanyBrandingPayload();
    $payload->fid        = $fid;
    $payload->companyFid = $companyFid;
    $payload->theme      = $theme;
    $payload->logoUrl    = $logoUrl;

    $ep = CompanyBrandingEndpoint::bound($this->getApi());
    return $ep->setCompanyBranding($payload)->get();
  }
}