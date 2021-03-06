<?php

namespace Knash94\Seo\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Knash94\Seo\Store\Eloquent\Models\HttpRedirect;

interface HttpRedirectsContract
{
    /**
     * Gets the latest HTTP errors
     *
     * @param string $sort
     * @param string $direction
     * @param bool $paginate
     * @param int $perPage
     * @return LengthAwarePaginator|Collection
     */
    public function getRedirects($sort = 'hits', $direction = 'desc', $paginate = true, $perPage = 12);

    /**
     * Checks whether the url has a redirect
     *
     * @param $url
     * @return null
     */
    public function getUrlRedirect($url);

    /**
     * Returns the HTTP Redirect of a given ID
     *
     * @param $id
     * @return HttpRedirect
     */
    public function getRedirect($id);

    /**
     * Updates the redirect
     *
     * @param $id
     * @param $data
     * @return \Illuminate\Database\Eloquent\Model|int|null
     */
    public function updateRedirect($id, $data);

    /**
     * Create a redirect
     *
     * @param $data
     * @return \Illuminate\Database\Eloquent\Model|int|null
     */
    public function createRedirect($data);

    /**
     * Deletes the redirect
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id);
}