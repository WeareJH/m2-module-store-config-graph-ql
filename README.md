# JH Store Config GraphQL Module #

## Overview
This module exposes extra store configuration values in GraphQl

## Exposed data

### Request
```
{
  storeConfig {
    store_name
    store_phone_number
    store_hours
    store_country_id
    store_region_id
    store_postcode
    store_city
    store_street_line1
    store_street_line2
    store_vat_number
    site_banner_enabled
    site_banner_content
  }
}
```
