module GenerateOGImageTags
  class Generator < Jekyll::Generator
    def generate(site)
      generate_og_image_tags site
    end

    def generate_og_image_tags(site)
      site.posts.each do |post|
        first_image_src = get_first_image_src(post.content)

        if is_usable_for_og(first_image_src) then
          post.data['image'] = first_image_src
        end
      end
    end

    def get_first_image_src(content)
      content[/img.*?src="(.*?)"/i, 1]
    end

    def is_usable_for_og(src)
      !src.nil? && src.start_with?('/images/blog/')
    end
  end
end