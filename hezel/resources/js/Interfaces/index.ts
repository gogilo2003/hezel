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
    price: number | null
    status: string | ""
    location: string | ""
    featured: boolean
    published: boolean
    hot: boolean
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

export interface iItem {
    id: number
    name: string
}
