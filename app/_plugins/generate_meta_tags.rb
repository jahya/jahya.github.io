module GenerateMetaTags
  class Generator < Jekyll::Generator
    def generate(site)
      load_regexes
      generate_meta_tags site
    end

    def load_regexes
      @img_tag_regex = /img.*?src="(.*?)"/i
      @vimeo_tag_regex = /player.vimeo.com\/video\/(.*?)\?/i
      @youtube_tag_regex = /youtube.com\/embed\/(.*?)"/i
      @paragraph_tag_regex = /<p>(.*)<\/p>/i
    end

    def generate_meta_tags(site)
      site.posts.each do |post|
        generate_image_tags(post)
        generate_description_tags(post)
      end
    end

    def generate_image_tags(post)
      discover_which_image_source(post.content)
      first_image_src = get_first_image_src(post.content)

      if is_usable(first_image_src) then
        post.data['image'] = first_image_src
      end
    end

    def generate_description_tags(post)
      first_paragraph = get_first_paragraph(post.content)

      if is_usable(first_paragraph) then
        first_paragraph = strip_tags(first_paragraph)
        post.data['description'] = first_paragraph
      end
    end

    def discover_which_image_source(content)
      potentials = {
        img: find_first_position_of(@img_tag_regex, content),
        vimeo: find_first_position_of(@vimeo_tag_regex, content),
        youtube: find_first_position_of(@youtube_tag_regex, content)
      }
      (potentials.min_by {|k,v| v || 1000000}).first
    end

    def get_first_image_src(content)
      content[@img_tag_regex, 1]
    end

    def get_first_paragraph(content)
      content[@paragraph_tag_regex, 1]
    end

    def strip_tags(content)
      content.gsub(/<\/?[^>]*>/, "")
    end

    def is_usable(src)
      !src.nil?
    end

    def find_first_position_of(needle, haystack)
      (haystack.enum_for(:scan, needle).map { Regexp.last_match.begin(0) }).first
    end
  end
end