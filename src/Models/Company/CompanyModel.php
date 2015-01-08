<?php
namespace Fortifi\Sdk\Models\Company;

use Fortifi\FortifiApi\Company\Payloads\CompanyEmployeesPayload;
use Fortifi\FortifiApi\Company\Payloads\CreateCompanyPayload;
use Fortifi\FortifiApi\Company\Payloads\UpdateCompanyPayload;
use Fortifi\FortifiApi\Company\Endpoints\CompanyEndpoint;
use Fortifi\FortifiApi\Company\Responses\CompanyResponse;
use Fortifi\FortifiApi\Company\Responses\CompaniesResponse;
use Fortifi\FortifiApi\Company\Responses;
use Fortifi\FortifiApi\Edge\Payloads\EdgePayload;
use Fortifi\FortifiApi\Employee\Responses\EmployeesResponse;
use Fortifi\FortifiApi\Foundation\Payloads\FidPayload;
use Fortifi\FortifiApi\Foundation\Payloads\PaginatedDataNodePayload;
use Fortifi\FortifiApi\Foundation\Requests\FortifiApiRequestInterface;
use Fortifi\FortifiApi\Foundation\Responses\BoolResponse;
use Fortifi\FortifiApi\Foundation\Responses\FidResponse;
use Fortifi\FortifiApi\Foundation\Responses\FidsResponse;
use Fortifi\Sdk\Models\Api\FortifiApiModel;

class CompanyModel extends FortifiApiModel
{
  /**
   * @param int    $limit
   * @param int    $page
   * @param string $sortField
   * @param string $sortDirection
   * @param bool   $showDeleted
   * @param string $filter
   *
   * @return CompaniesResponse|FortifiApiRequestInterface
   */
  public function all(
    $limit = null, $page = null, $sortField = null, $sortDirection = null,
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

    $ep = CompanyEndpoint::bound($this->getApi());
    return $ep->all($payload)->get();
  }

  /**
   * @param int $fid
   *
   * @return CompanyResponse|FortifiApiRequestInterface
   */
  public function retrieve($fid)
  {
    $payload      = new FidPayload();
    $payload->fid = $fid;

    $ep = CompanyEndpoint::bound($this->getApi());
    return $ep->retrieve($payload)->get();
  }

  /**
   * @param string $legalName
   * @param string $name
   * @param string $description
   *
   * @return FortifiApiRequestInterface|FidResponse
   */
  public function create($legalName, $name, $description)
  {
    $payload              = new CreateCompanyPayload();
    $payload->legalName   = $legalName;
    $payload->name        = $name;
    $payload->description = $description;

    $ep = CompanyEndpoint::bound($this->getApi());
    return $ep->create($payload)->get();
  }

  /**
   * @param string $fid
   * @param string $legalName
   * @param string $name
   * @param string $description
   *
   * @return FortifiApiRequestInterface|BoolResponse
   */
  public function update($fid, $legalName, $name, $description)
  {
    $payload              = new UpdateCompanyPayload();
    $payload->fid         = $fid;
    $payload->name        = $name;
    $payload->legalName   = $legalName;
    $payload->description = $description;

    $ep = CompanyEndpoint::bound($this->getApi());
    return $ep->update($payload)->get();
  }

  /**
   * @param string $fid
   *
   * @return FortifiApiRequestInterface|BoolResponse
   */
  public function delete($fid)
  {
    $payload      = new UpdateCompanyPayload();
    $payload->fid = $fid;

    $ep = CompanyEndpoint::bound($this->getApi());
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

    $ep = CompanyEndpoint::bound($this->getApi());
    return $ep->restore($payload)->get();
  }

  /**
   * @param string $companyFid
   * @param        $items
   *
   * @return FortifiApiRequestInterface|BoolResponse
   */
  public function addEmployees($companyFid, $items)
  {
    $payload              = new CompanyEmployeesPayload();
    $payload->companyFid  = $companyFid;
    $payload->items       = $items;

    $ep = CompanyEndpoint::bound($this->getApi());
    return $ep->addEmployees($payload)->get();
  }

  /**
   * @param string $companyFid
   * @param        $items
   *
   * @return FortifiApiRequestInterface|BoolResponse
   */
  public function removeEmployees($companyFid, $items)
  {
    $payload              = new CompanyEmployeesPayload();
    $payload->companyFid  = $companyFid;
    $payload->items       = $items;

    $ep = CompanyEndpoint::bound($this->getApi());
    return $ep->removeEmployees($payload)->get();
  }

  /**
   * @param string $companyFid
   * @param        $items
   *
   * @return FortifiApiRequestInterface|BoolResponse
   */
  public function replaceEmployees($companyFid, $items)
  {
    $payload              = new CompanyEmployeesPayload();
    $payload->companyFid  = $companyFid;
    $payload->items       = $items;

    $ep = CompanyEndpoint::bound($this->getApi());
    return $ep->replaceEmployees($payload)->get();
  }

  /**
   * @param string $fid
   *
   * @param bool   $loadRefs
   * @param int    $limit
   * @param int    $page
   * @param string $sortField
   * @param string $sortDirection
   * @param string $filter
   *
   * @return EmployeesResponse
   */
  public function getEmployees(
    $fid, $loadRefs, $limit, $page, $sortField, $sortDirection, $filter
  )
  {
    $payload = new EdgePayload();
    $payload->fid = $fid;
    $payload->loadRefs = $loadRefs;
    $payload->limit = $limit;
    $payload->page = $page;
    $payload->sortField = $sortField;
    $payload->sortDirection = $sortDirection;
    $payload->filter = $filter;

    $ep = CompanyEndpoint::bound($this->getApi());
    return $ep->getEmployees($payload)->get();
  }
}
