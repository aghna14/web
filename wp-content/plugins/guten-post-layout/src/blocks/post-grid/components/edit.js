import Slider from "react-slick";
import moment from 'moment';
import Inspector from "./inspector";
const { Component } = wp.element;
const { InspectorControls, BlockControls, AlignmentToolbar, BlockAlignmentToolbar } = wp.editor;
const { Fragment } = wp.element;
const { withSelect } = wp.data;
const { __ } = wp.i18n;
const { QueryControls, PanelBody, Spinner,Placeholder, RangeControl, SelectControl, Toolbar, ToggleControl, TextControl } = wp.components;
const { decodeEntities } = wp.htmlEntities;


class PostGridEdit extends Component{

    constructor(props) {
        super(...arguments);
    }
    
    render(){

        const { attributes, categoriesList, setAttributes, latestPosts, className, postTypes, media, authors, regTaxonomyName} = this.props;
        const { post_type, categories, order, orderBy, postscount, columns, postLayout, displayPostImage, displayPostDate, displayPostAuthor, displayPostExcerpt, displayPostReadMoreButton, postReadMoreButtonText, align, postImageSizes, carouselLayoutStyle, gridLayoutStyle, postBlockWidth, slidesToShow, autoPlay, navigation, columnGap, linkTarget, equalHeight, imageHeight,

            // cta attrs
            postCtaButtonAlign,
            displayPostCtaButton,
            postCtaButtonText,
            CtaLinkTarget,
            postCtaButtonLink,
            postCtaButtonStyle,
            displayCtaButtonIcon
        } = attributes;
        
        const hasPosts = Array.isArray(latestPosts) && latestPosts.length;
        const hasPostTypes = Array.isArray(postTypes) && postTypes.length;
        const mediaItems = Array.isArray(media) && media.length;
        

        
        if( !hasPosts || !hasPostTypes || !mediaItems){ 
            return(
                <Fragment>
                    <Inspector { ...{setAttributes, ...this.props} }/>
                    <Placeholder
                        icon="admin-post"
                        label={ __( 'No Posts Available' ) }
                    >
                        {
                            !Array.isArray(latestPosts) || !Array.isArray(hasPostTypes) || !Array.isArray(mediaItems) ? <Spinner /> : __( 'No posts found.' )
                        }
                    </Placeholder>
                </Fragment>
            );
        }
        
        const displayPosts = latestPosts.length > postscount ? latestPosts.slice(0, postscount) : latestPosts;
     
        const settings = {
            arrows: navigation === 'dots' || navigation === 'none' ? false : true,
            dots: navigation === 'arrows' || navigation === 'none' ? false : true,
            infinite: true,
            speed: 500,
            slidesToShow: displayPosts.length === 1 ? 1 : slidesToShow,
            slidesToScroll: 1,
            autoplay: autoPlay,
            autoplaySpeed: 3000,
            cssEase: "linear",
            responsive: [
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        };
        
        const getPostAuthorName = ( author_id ) => {
            for(let author in authors){
                if( authors[author].id === author_id ){
                    return authors[author].name;
                }
            }
        };

        const getPostAuthorUrl = ( author_id ) => {
            for(let author in authors){
                if( authors[author].id === author_id ){
                    return authors[author].link;
                }
            }
        };

        // set post taxonomy name to get post cats by taxonomy name on front end
        regTaxonomyName !== undefined ? setAttributes({taxonomyName: regTaxonomyName}) : '';
        
        const layoutControls = [
            {
                icon: 'grid-view',
                title: __( 'Grid View' ),
                onClick: () => setAttributes( { postLayout: 'grid' } ),
                isActive: postLayout === 'grid',
            },
            {
                icon: 'list-view',
                title: __( 'List View' ),
                onClick: () => setAttributes( { postLayout: 'list' } ),
                isActive: postLayout === 'list',
            },
            {
                icon: 'slides',
                title: __( 'Slides View' ),
                onClick: () => setAttributes( { postLayout: 'slides' } ),
                isActive: postLayout === 'slides',
            },
        ];
        
        const gridView = (postLayout === 'grid' ) ? `gpl-column-${columns}` : ``;
        const gridViewWrapper = (postLayout === 'list' ) ? `list-layout` : ``;
        const postItemHeight = equalHeight ? `equal-height` : ``;
        const _postCtaButtonStyle = postCtaButtonStyle ? `gpl-cta-fill-btn` : ``;

        const itemStyle = {
            '--item-padding-left-right' : columnGap ? `${columnGap}px` : undefined,
            '--item-margin-bottom' : columnGap ? `${columnGap*2}px` : undefined,
            '--item-height' : columnGap && imageHeight ? `${(imageHeight/2)-columnGap}px` : undefined,
            '--image-height' : imageHeight ? `${imageHeight}px` : undefined,
        };
        
        const firstPostItem = displayPosts.length > 0 && gridLayoutStyle === 'g_skin2' ? displayPosts[0] : null;
        
        
        return (
            <Fragment>
                <BlockControls>
                    <BlockAlignmentToolbar
                        value={ postBlockWidth }
                        onChange={ postBlockWidth => setAttributes( { postBlockWidth } ) }
                        controls={ [ 'wide', 'full' ] }
                     />
                     <AlignmentToolbar
                         value={align}
                         onChange={(nextAlign) => {
                             setAttributes({align: nextAlign});
                         }}
                     />
               
                    <Toolbar controls={ layoutControls } />
                    
                </BlockControls>

                <Inspector { ...{setAttributes, ...this.props} }/>

                { postLayout === 'slides' ? (
                    <div style={itemStyle}>
                    <Slider { ...settings } className={`${ className } post-grid-view gpl-d-flex gpl-flex-wrap ${carouselLayoutStyle}`}>
                        {

                            displayPosts.map((post, i) =>
                                
                                <article className={`post-item gpl-mb-30 ${gridView} ${carouselLayoutStyle}`}>
                                    <div className={`post-content-area ${align} ${ post.guten_post_layout_featured_media_urls[postImageSizes][0] ? 'has-image' : '' }`}>
                                        {
                                            ( carouselLayoutStyle === 'skin1' ) ? (
                                                <a className={'active-post-link'} href={post.link} target={`${linkTarget ? '_blank' : '_self'}`}></a>
                                            ) : ( null )
                                        }
                                        {
                                            post.guten_post_layout_featured_media_urls[postImageSizes][0] && displayPostImage ? (
                                                <div className="post-image">
                                                    <a href={post.link} target={`${linkTarget ? '_blank' : '_self'}`} rel="bookmark">
                                                        <img src={post.guten_post_layout_featured_media_urls[postImageSizes][0]}/>
                                                    </a>
                                                </div>
                                            ) : (null)

                                        }
                                        <div className={`gpl-inner-post-content ${ post.guten_post_layout_featured_media_urls[postImageSizes][0] ? 'content-has-image' : '' }`}>
                                        {carouselLayoutStyle !== 'skin1' &&
                                        <div className="post-meta">
                                            {
                                                displayPostAuthor && getPostAuthorUrl(post.author) && getPostAuthorName(post.author) &&
                                                <a target="_blank"
                                                   href={getPostAuthorUrl(post.author)}>{getPostAuthorName(post.author)}</a>
                                            }

                                            {displayPostDate && post.date_gmt &&
                                            <time dateTime={moment(post.date_gmt).utc().format()}>
                                                {moment(post.date_gmt).local().format('MMMM DD, Y')}
                                            </time>
                                            }

                                        </div>
                                        }
                                        
                                        {post.title && post.type !== 'wp_block' &&
                                        <h2 className="post-title">
                                            <a href={post.link} target="_blank" rel="bookmark">
                                                {
                                                    decodeEntities(post.title.rendered.trim()) || __('Untitled')
                                                }
                                            </a>
                                        </h2>
                                        }

                                        {displayPostExcerpt && post.excerpt && post.type !== 'wp_block' &&
                                        <div className="post-excerpt">
                                            <div dangerouslySetInnerHTML={{__html: post.excerpt.rendered.trim()}}/>
                                        </div>
                                        }

                                        {displayPostReadMoreButton && post.link &&
                                        <a className="post-read-moore" href={post.link} target={`${linkTarget ? '_blank' : '_self'}`}
                                           rel="bookmark">{postReadMoreButtonText}</a>
                                        }
                                        
                                        </div>
                                        
                                        {carouselLayoutStyle === 'skin1' &&
                                            <div className={'gpl-overlay-effect'}></div>
                                        }
                                        
                                        
                                    </div>
                                    
                                </article>
                            )

                        }
                    </Slider></div>) : (

                   <div className={`${ className } post-grid-view gpl-d-flex gpl-flex-wrap ${gridLayoutStyle} ${gridViewWrapper}`} style={itemStyle}>
                       {
                           firstPostItem ? (
                               <div className={`gpl-column-4`} >
                                   {
                                          <article className={`post-item gpl-plr-15 gpl-mb-30 ${gridLayoutStyle}`}>
                                              <div className={`post-item-wrapper ${postItemHeight}`}>
                                               <div className={`post-content-area ${align}`}>
                                                   {
                                                       firstPostItem.guten_post_layout_featured_media_urls[postImageSizes][0] && displayPostImage ? (
                                                           <div className="post-image">
                                                               <a href={firstPostItem.link} target={`${linkTarget ? '_blank' : '_self'}`}  rel="bookmark">
                                                                   <img src={firstPostItem.guten_post_layout_featured_media_urls[postImageSizes][0]}/>
                                                               </a>
                                                           </div>
                                                       ) : (null)

                                                   }

                                                   <div className={'gpl-inner-post-content'}>
                                                       {
                                                           ( gridLayoutStyle === 'g_skin2' || gridLayoutStyle === 'g_skin1' ) ? (
                                                               <a className={'active-post-link'} href={firstPostItem.link} target={`${linkTarget ? '_blank' : '_self'}`}></a>
                                                           ) : ( null )
                                                       }
                                                       <div className="post-meta">
                                                           {
                                                               ( displayPostAuthor && getPostAuthorUrl(firstPostItem.author) && getPostAuthorName(firstPostItem.author) && gridLayoutStyle !== 'g_skin2' )&&
                                                               <a target="_blank"
                                                                  href={getPostAuthorUrl(firstPostItem.author)}>{getPostAuthorName(firstPostItem.author)}</a>
                                                           }

                                                           { displayPostDate && firstPostItem.date_gmt && 
                                                           <time dateTime={moment(firstPostItem.date_gmt).utc().format()}>
                                                               {moment(firstPostItem.date_gmt).local().format('MMMM DD, Y')}
                                                           </time>
                                                           }

                                                       </div>


                                                       <h2 className="post-title">
                                                           <a href={firstPostItem.link} target="_blank" rel="bookmark">
                                                               {
                                                                   firstPostItem.type !== 'wp_block' &&
                                                                   decodeEntities(firstPostItem.title.rendered.trim()) || __('Untitled')
                                                               }
                                                           </a>
                                                       </h2>


                                                       {displayPostExcerpt && firstPostItem.excerpt && gridLayoutStyle !== 'g_skin1' && gridLayoutStyle !== 'g_skin2' &&  firstPostItem.type !== 'wp_block' &&
                                                       <div className="post-excerpt">
                                                           <div dangerouslySetInnerHTML={{__html: firstPostItem.excerpt.rendered.trim()}}/>
                                                       </div>
                                                       }
                                                       
                                                       
                                                       {displayPostReadMoreButton && firstPostItem.link && gridLayoutStyle !== 'g_skin1' && gridLayoutStyle !== 'g_skin2' &&
                                                       <a className="post-read-moore" href={firstPostItem.link} target={`${linkTarget ? '_blank' : '_self'}`}
                                                          rel="bookmark">{postReadMoreButtonText}</a>
                                                       }
                                                   </div>
                                                   <div className="gpl-overlay-effect"></div>
                                               </div>
                                              </div>

                                           </article>
                                   }
                               </div>
                           ) : (null)
                       }
                        
                       
                       <div className={gridLayoutStyle === 'g_skin2' ? `gpl-column-8 gpl-d-flex gpl-flex-wrap` : `gpl-column-12 gpl-d-flex gpl-flex-wrap` }>
                           
                        {
                            displayPosts.map( ( post, i ) => {
                                let article = <article
                                    className={`post-item gpl-mb-30 ${gridView} ${gridLayoutStyle}`}>
                                    <div className={`post-item-wrapper ${postItemHeight}`}>
                                    <div className={`post-content-area ${align}`}>
                                        {
                                            ( gridLayoutStyle === 'g_skin2' || gridLayoutStyle === 'g_skin1') ? (
                                                <a className={'active-post-link'} href={post.link} target={`${linkTarget ? '_blank' : '_self'}`}></a>
                                            ) : ( null )
                                        }
                                        {
                                            post.guten_post_layout_featured_media_urls[postImageSizes][0] && displayPostImage ? (
                                                <div className="post-image">
                                                    <a href={post.link} target={`${linkTarget ? '_blank' : '_self'}`} rel="bookmark">
                                                        <img src={post.guten_post_layout_featured_media_urls[postImageSizes][0]}/>
                                                    </a>
                                                </div>
                                            ) : (null)

                                        }
                        
                                        <div className={'gpl-inner-post-content'}>
                                            <div className="post-meta">
                                                {
                                                    ( displayPostAuthor && getPostAuthorUrl(post.author) && getPostAuthorName(post.author) && gridLayoutStyle !== 'g_skin2' ) &&
                                                    <a target="_blank"
                                                       href={getPostAuthorUrl(post.author)}>{getPostAuthorName(post.author)}</a>
                                                }
                        
                                                {displayPostDate && post.date_gmt &&
                                                <time dateTime={moment(post.date_gmt).utc().format()}>
                                                    {moment(post.date_gmt).local().format('MMMM DD, Y')}
                                                </time>
                                                }
                        
                                            </div>

                                            
                                            <h2 className="post-title">
                                                <a href={post.link} target="_blank" rel="bookmark">
                                                    {
                                                        post.type !== 'wp_block' &&
                                                        decodeEntities(post.title.rendered.trim()) || __('Untitled')
                                                    }
                                                </a>
                                            </h2>
                                            
                                          
                                            {displayPostExcerpt && post.excerpt && gridLayoutStyle !== 'g_skin1' && gridLayoutStyle !== 'g_skin2' && post.type !== 'wp_block' &&
                                            <div className="post-excerpt">
                                                <div dangerouslySetInnerHTML={
                                                    {
                                                        __html: post.excerpt.rendered.trim()
                                                    }
                                                }/>
                                            </div>
                                            }
                                            
                        
                                            {displayPostReadMoreButton && post.link && gridLayoutStyle !== 'g_skin1' && gridLayoutStyle !== 'g_skin2' &&
                                            <a className="post-read-moore" href={post.link} target={`${linkTarget ? '_blank' : '_self'}`}
                                               rel="bookmark">{postReadMoreButtonText}</a>
                                            }
                                        </div>
                                        <div className="gpl-overlay-effect"></div>
                                    </div>
                                    </div>
                                </article>
                                if( i > 0 && gridLayoutStyle === 'g_skin2' ){
                                    return article;
                                } else if ( gridLayoutStyle !== 'g_skin2' ) {
                                    return article;
                                }
                                
                            }
                            )
                        }
                        
                       </div>


                       {displayPostCtaButton && postCtaButtonLink &&
                       <div className={`gpl-cta-wrapper ${postCtaButtonAlign}`}>
                           <a className={`gpl-cta-btn ${_postCtaButtonStyle}`}
                              href={postCtaButtonLink} target={`${CtaLinkTarget ? '_blank' : '_self'}`}
                              rel="bookmark">{postCtaButtonText}
                               {displayCtaButtonIcon &&
                               <i className={`gpl-blocks-icon-long-arrow-right`}></i>
                               }
                           </a>
                       </div>
                       }
                       
                    </div>
                )

                }
            </Fragment>
        );

    }
}

export default withSelect( ( select, props ) => {
    const { categories, order, orderBy, postscount, post_type} = props.attributes;
    
    const { getEntityRecords, getPostTypes, getTaxonomies, getAuthors, getMediaItems} = select( 'core' );
    let regCategories = getTaxonomies();
    
    const hasCategories = Array.isArray(regCategories) && regCategories.length;
    
    if(!hasCategories){
        return;
    }
    
    var taxonomy_name = [];
    let restBase = null;
    
    regCategories.map( (item, index ) => {
        if (item.types.includes(post_type)){
            taxonomy_name.push(item.slug);

            if (taxonomy_name.length === 1) {
                restBase = item.rest_base;
            }
        }
    });
    
    const latestPostsQuery = {
        order,
        orderby: orderBy,
        per_page: postscount,
    };
    
    if (categories && restBase) {
        latestPostsQuery[restBase] = categories;
    }

    const query = { per_page: 100 };
    return {
        latestPosts: getEntityRecords( 'postType', post_type, latestPostsQuery ),
        categoriesList: getEntityRecords( 'taxonomy', taxonomy_name[0], query ),
        postTypes: getPostTypes(),
        media: getMediaItems(),
        authors: getAuthors(),
        regTaxonomyName: taxonomy_name[0],
    };
} )( PostGridEdit );