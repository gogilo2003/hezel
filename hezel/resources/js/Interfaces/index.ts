export interface iLink {
    url: string,
    label: string,
    active: string,
}

export interface iPicture {
    id: number | null
    url: string | ""
    thumb: string | ""
    caption: string | ""
}

export interface iProperty {
    id: number | null
    slug: string | ""
    picture: string | ""
    pictures: iPicture[] | null
    title: string | ""
    description: string | ""
    price: number | ""
    longitude: number | null
    latitude: number | null
    status: string | ""
    location: string | ""
    featured: boolean
    published: boolean
    hot: boolean
    county: { id: number, name: string | "" } | null
    sub_county: { id: number, name: string | "" } | null
    ward: { id: number, name: string | "" } | null
    town: { id: number, name: string | "" } | null
}

export interface iProperties {
    data: iProperty[]
    current_page: number,
    first_page_url: string | null,
    from: number,
    last_page: number,
    last_page_url: string | null,
    links: Array<iLink>,
    next_page_url: string | null,
    path: string | null,
    per_page: number,
    prev_page_url: string | null,
    to: number,
    total: number,
}
